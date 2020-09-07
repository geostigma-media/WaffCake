<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ClientCard;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request)
    {
        $user = User::findOrFail($request->userId);
        $from = $request->from;
        $redirectTo = is_null($from) ? 'home' : $from;

        // ClientCard::create([
        //     'codReference' => rand(1000, 9999),
        //     'state' => 1,
        //     'userId' => $user->id,
        // ]);

        Session::flash('message', 'Usario activado con éxito.');
        return redirect()->route($redirectTo);
    }
    //TODO: move the route of this method to api routes file
    public function findByClientCard(ClientCard $clientCard)
    {
        $user = User::find($clientCard->userId);
        return response()->json($user);
    }
}
