<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\SendEmailToAdvertiser;

class SendMailController extends Controller
{
    public function sendMail(ContactRequest $user)
    {
        \Mail::to($user->adv_email)->send(new sendEmailToAdvertiser($user));

        return back();
    }
}
