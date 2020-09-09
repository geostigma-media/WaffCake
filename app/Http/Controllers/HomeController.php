<?php

namespace App\Http\Controllers;

use App\BuysGeneral;
use App\ClientCard;
use App\CuponBuy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferenceClients;
use App\ResponseSurveys;
use App\Surveys;
use Illuminate\Support\Facades\Session;
use Notification;
use App\Notifications\NewReferralNotification;

class HomeController extends Controller
{
  private $respondida = true;

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $idAuth = Auth()->user()->id;
    $rol = Auth()->user()->roleId;

    if ($rol == 2) {
      $purachases = DB::table('users')
        ->join('client_cards', 'users.id', '=', 'client_cards.userId')
        ->select(
          'users.id',
          'client_cards.codReference',
          'client_cards.id',
          'client_cards.userId',
          'client_cards.created_at'
        )
        ->where('userId', $idAuth)
        ->get();
      $purachasesEspecial = DB::table('cupon_buys')
        ->join('client_cards', 'cupon_buys.regularClienteId', '=', 'client_cards.id')
        ->where('client_cards.userId', $idAuth)
        ->where('client_cards.state', 1)
        ->get();
      $conteoPurachasesEspecial = count($purachasesEspecial);
      $surveysActive = Surveys::with('responseSurveys')->where('state', 1)->get();

      foreach ($surveysActive as $key => $value1) {
        $conteo = count($value1->responseSurveys);
        if ($conteo > 0) {
          foreach ($value1->responseSurveys as $key => $value2) {
            if ($value2->userId === $idAuth && $value1->id === $value2->surveysId) {
              $this->respondida = false;
            } else {
              $this->respondida = true;
            }
          }
        }
        $value1->ResponseEncuesta = $this->respondida;
        $this->respondida = true;
      }

      $countPurachases = count($purachases);

      $purachasesClientRegular = DB::table('users')
        ->join('buys_generals', 'users.id', '=', 'buys_generals.userId')
        ->select(
          'users.id',
          'users.name',
          'users.lastname',
          'buys_generals.id',
          'buys_generals.userId',
          'buys_generals.created_at'
        )
        ->where('userId', $idAuth)
        ->get();
      $purachasesClientRegular = CuponBuy::with('clientCard')->count();

      $countPurachasesTotal = $countPurachases + $purachasesClientRegular;
      $codeClient = ClientCard::select('codReference')
        ->where('state', 1)
        ->where('userId', $idAuth)
        ->get();

      $codeReferenceUser = DB::table('users')
        ->leftJoin('client_cards', 'users.id', '=', 'client_cards.userId')
        ->select('client_cards.codReference')
        ->where('client_cards.state', 1)
        ->where('userId', $idAuth)
        ->get();

      if ($codeReferenceUser != '[]') {
        $codReference = $codeReferenceUser[0];

        //We must verify that the user's referrals have at least one purchase
        $activeUserReferrals = USER::where('userReferide', $codReference->codReference)->get();
        $referralsBuysCount = 0;
        foreach ($activeUserReferrals as $referral) {
          $clientCard = ClientCard::where('userId', $referral->id)->withCount('cupons')->first();

          if($clientCard && $clientCard->cupons_count){
            $referralsBuysCount ++;
          }
        }

        return view('home', compact(
          'purachases',
          'codeClient',
          'referralsBuysCount',
          'conteoPurachasesEspecial',
          'purachasesClientRegular',
          'countPurachases',
          'surveysActive',
          'purachasesEspecial'
        ));
      }
      return view('home', compact(
        'purachasesClientRegular',
        'countPurachasesTotal',
        'surveysActive'
      ));
    } else {
      $listClients = DB::table('users')
        ->where('roleId', 2)
        ->whereNotExists(function ($query) {
          $query->select(DB::raw(1))
            ->from('client_cards')
            ->whereRaw('client_cards.userId = users.id');
        })->get();
      $frecuentClients = ClientCard::select('id', 'codReference')->where('state', 1)->get();
      $clients = User::where('roleId', 2)->count();
      $totalBuysRegular = BuysGeneral::count();
      $totalBuysEspecial = CuponBuy::count();
      $totalBuys = $totalBuysRegular + $totalBuysEspecial;
      $especialClients = ClientCard::where('state', 1)->count();
      return view('home', compact('clients', 'especialClients', 'totalBuys', 'frecuentClients', 'listClients'));
    }
  }

  public function sendEmail(Request $request)
  {
    $toAddress = $request->emialReferide;
    Notification::route('mail', $toAddress)->notify(new NewReferralNotification( ['code' => $request->codReference,'recipient' => $toAddress] ) );
    Session::flash('message', 'Correo electronico enviado con éxito');
    return redirect()->route('home');
  }

  public function getUser($id)
  {
    $user = User::find($id);
    return view('editUser', compact('user'));
  }

  public function updateUser(Request $request, $id)
  {
    $user = User::find($id);
    if ($request->password == '') {
      $user->name = $request->name;
      $user->lastname = $request->lastname;
      $user->numIndentificate = $request->numIndentificate;
      $user->email = $request->email;
      $user->userReferide = $request->userReferide;
      $user->mobile = $request->mobile;
    } else {
      $user->name = $request->name;
      $user->lastname = $request->lastname;
      $user->numIndentificate = $request->numIndentificate;
      $user->email = $request->email;
      $user->userReferide = $request->userReferide;
      $user->password = Hash::make($request->password);
      $user->mobile = $request->mobile;
    }
    $user->update();
    Session::flash('message', 'Usuario actualizado con exito');
    return redirect()->route('home');
  }
}
