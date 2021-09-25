<?php

namespace App\Models;

use App\Notifications\OrgAdminResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class OrgAdmin extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard = 'org_admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new OrgAdminResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\sendOrgAdminEmailVerificationNotification());
    }
}