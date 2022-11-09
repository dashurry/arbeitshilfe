<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConsultController extends Controller
{
    public function sendMail(Request $req)
    {
        $this->validate($req,[
            "name" => "required",
            "email" => "required|email",
            "phone"=>"required",
        ]);
        $data = array(
            "name" => $req->name,
            "email" => $req->email,
            "phone" => $req->phone
        );

        Mail::to('info@arbeitshilfe.website')->send(new \App\Mail\Consultation($data));
        return 0;
    }
}
