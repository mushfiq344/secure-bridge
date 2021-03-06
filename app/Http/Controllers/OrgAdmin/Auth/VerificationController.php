<?php

namespace App\Http\Controllers\OrgAdmin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Create a controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:org_admin');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user('org_admin')->hasVerifiedEmail()
        ? redirect()->route('org-admin.home')
        : view('org_admin.auth.verify', [
            'resendRoute' => 'org-admin.verification.resend',
        ]);
    }

    /**
     * Verfy the user email.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        if ($request->route('id') != $request->user('org_admin')->getKey()) {
            //id value doesn't match.
            return redirect()
                ->route('org-admin.verification.notice')
                ->with('error', 'Invalid user!');
        }

        if ($request->user('org_admin')->hasVerifiedEmail()) {
            return redirect()
                ->route('org-admin.home');
        }

        $request->user('org_admin')->markEmailAsVerified();

        return redirect()
            ->route('org-admin.home')
            ->with('status', 'Thank you for verifying your email!');
    }

    /**
     * Resend the verification email.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        if ($request->user('org_admin')->hasVerifiedEmail()) {
            return redirect()->route('org-admin.home');
        }

        $request->user('org_admin')->sendEmailVerificationNotification();

        return redirect()
            ->back()
            ->with('status', 'We have sent you a verification email!');
    }

}