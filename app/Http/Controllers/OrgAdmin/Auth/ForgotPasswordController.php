<?php

namespace App\Http\Controllers\OrgAdmin\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:org_admin');
    }

    /**
     * Show the reset email form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {

        return view('org_admin.auth.passwords.email', [
            'title' => 'Organization Admin Password Reset',
            'passwordEmailRoute' => 'org-admin.password.email',
        ]);
    }

    /**
     * password broker for admin guard.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('org_admins');
    }

    /**
     * Get the guard to be used during authentication
     * after password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard()
    {
        return Auth::guard('org_admin');
    }
}