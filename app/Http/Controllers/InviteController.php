<?php

namespace App\Http\Controllers;

use App\User;
use App\Invite;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class InviteController extends Controller
{

  public function store(Request $request)
  {
      $this->validate(
        $request,
        [
            'email' => 'required|email|unique:invites'
        ],
        [

        ],
        [
          'email.unique' => 'Ya fue solicitada una invitación con este email.'
        ]
      );
      $invitation = new Invite($request->all());
      $invitation->generateInvitationToken();
      $invitation->save();

      return redirect()->back()->with('success', 'Invitación a registrarse solicitada correctamente. Por favor, espere al link de registro.');
  }
  public function index()
  {
    $invitations = Invite::where('registered_at', null)->orderBy('created_at', 'desc')->get();
    return view('invites.show', compact('invitations'));
  }

  
}
