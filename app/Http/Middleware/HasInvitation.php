<?php

namespace App\Http\Middleware;

use App\Invite;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HasInvitation
{

    public function handle($request, Closure $next)
    {
        /**
         * Only for GET requests. Otherwise, this middleware will block our registration.
         */
        if ($request->isMethod('get')) {

            /**
             * No token = Goodbye.
             */
            if (!$request->has('invitation_token')) {
                return redirect(route('invite-request'));
            }

            $invitation_token = $request->get('invitation_token');

            /**
             * Lets try to find invitation by its token.
             * If failed -> return to request page with error.
             */
            try {
                $invitation = Invite::where('invitation_token', $invitation_token)->firstOrFail();
            } catch (ModelNotFoundException $e) {
                return redirect(route('invite-request'))->with('error', 'Token de invitación invalido! Por favor chequee la URL.');
            }

            /**
             * Let's check if users already registered.
             * If yes -> redirect to login with error.
             */
            if (!is_null($invitation->registered_at)) {
                return redirect(route('login'))->with('error', 'Ya se ha usado el link de invitación.');
            }
        }

        return $next($request);
    }
}
