<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Psy\sh;


class MailController extends Controller
{
    public function show()
    {
        if (isset($_GET['name'])) {
            mail::to('maxvanschoonderwoerd@gmail.com')->send(new testEmail($_GET['name']));
        }
        return view('MailView');
    }
}
