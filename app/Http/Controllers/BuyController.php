<?php

namespace App\Http\Controllers;

use App\BuysGeneral;
use App\ClientCard;
use App\CuponBuy;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Notification;
use App\Notifications\NewUserAccountNotification;

class BuyController extends Controller
{
  public function index(CuponBuy $cuponBuy)
  {
    $buys = CuponBuy::with('clientCard.user')->get();
    $buysRegular = BuysGeneral::with('user')->get();
    return view('buys.index', compact('buys', 'buysRegular'));
  }

  public function loadBuys($id)
  {
    return response()->json(CuponBuy::where('regularClienteId', $id)->get());
  }

  public function create()
  {
    $frecuentClients = ClientCard::with('user')->where('state', 1)->get();
    $clients = DB::table('users')
      ->where('roleId', 2)
      ->whereNotExists(function ($query) {
        $query->select(DB::raw(1))
          ->from('client_cards')
          ->whereRaw('client_cards.userId = users.id');
      })
      ->get();
    return view('buys.create', compact('clients', 'frecuentClients'));
  }

  public function store(Request $request)
  {
    $countBuys = CuponBuy::where('regularClienteId', $request->regularClienteId)->count();
    $frecuentClients = ClientCard::with('user')->where('id', $request->regularClienteId)->get();
    $onyId = $frecuentClients[0]->userId;

    if ($countBuys == 11) {
      $clietCartState = ClientCard::find($request->regularClienteId);
      $clietCartState->state = 2;
      $clietCartState->update();
      ClientCard::create([
        'codReference' => random_int(1001, 5000),
        'state' => 1,
        'userId' => $clietCartState->user->id
      ]);
      $venta = CuponBuy::create([
        'regularClienteId' => $request->regularClienteId
      ]);
      Session::flash('message', 'Venta registrada con exito y tarjeta de usuario actualizada');
      return redirect()->route('home');
    }
    //dd($request->all());
    $venta = CuponBuy::create([
      'regularClienteId' => $request->regularClienteId,
      //'userId'=>$request->userId
    ]);
    $venta->save();
    Session::flash('message', 'Venta registrada con exito');
    return redirect()->route('home');
  }

  public function storeRegular(Request $request)
  {
    $user = User::find($request->userId);

    if (BuysGeneral::where('userId', $request->userId)->exists() || $user->userReferide == null) {
      BuysGeneral::create([
        'userId' => $request->userId,
      ]);
      Session::flash('message', 'Venta registrada con exito');
      ClientCard::create([
        'codReference' => rand(1000, 9999),
        'state' => 1,
        'userId' => $request->userId,
      ]);
      return redirect()->route('home');
    }

    BuysGeneral::create([
      'userId' => $request->userId,
    ]);

    Session::flash('messageReferide', 'PRIMERA COMPRA POR REFERIDO, RECLAMAR SU 2% DE DESCUENTO');
    Session::flash('message', 'Venta registrada con exito');
    return redirect()->route('buys');
  }

  public function createClient(RegisterRequest $request)
  {
    $toAddress = $request->email;
    $client = new User();
    $client->name = $request->name;
    $client->lastname = $request->lastname;
    $client->numIndentificate = $request->numIndentificate;
    $client->email = $toAddress;
    $client->password = Hash::make($request->numIndentificate);
    $client->mobile = $request->mobile;
    $client->roleId = 2;
    $client->save();

    Notification::route('mail', $toAddress)->notify(new NewUserAccountNotification(['login' => $toAddress,'pass' => $request->numIndentificate]) );
    Session::flash('message', 'Se ha enviado un coreo electrónico al usuario');

    return redirect()->route('buys');
  }

  public function listPurchaseClient()
  {
    $purachase = CuponBuy::with('user')->where(Auth()->user()->id)->get();
    return view('home', compact('purachase'));
  }

  public function codeRenovation(Request $request, User $user)
  {
    $user->update($request->all());
    return redirect()->route('buys');
  }

  public function destroy($id)
  {
    CuponBuy::find($id)->delete();
    Session::flash('message', 'La venta se elimino con exito');
    return redirect()->route('buys');
  }
}
