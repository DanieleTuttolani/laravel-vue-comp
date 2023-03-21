<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Models\NewsLetter;
use App\Mail\NewContactEmail;
use Illuminate\Support\Facades\Mail;


class NewContact extends Controller
{
    public function send(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'title' => 'bail|required|string',
                'email' => 'required|email',
                'description' => 'required|string',
            ]
            ,
            [
                'title.required' => 'il titolo è necessario',
                'title.string' => 'il titolo deve essere un testo',
                'email.required' => "L'email è necessaria",
                'email.email' => 'Email inserita non è valida',
                'description.required' => 'devi inserire una descrizione',
                'description.string' => 'la descrizione fornita è invalida'
            ]
        );
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 401);
        }
        $data = $request->all();
        $sent = 'il messaggio è stato inviato';
        if (Arr::exists($data, 'subscribe') && $data['subscribe']) {
            $exists = NewsLetter::where('email', $data['email'])->get();

            if (!count($exists)) {
                $new_member = new NewsLetter();
                $new_member->email = $data['email'];
                $new_member->save();
                $sent = 'Ora sei iscritto alla news Letter';
            }
        }
        $email = new NewContactEmail($data);
        Mail::to('Videogames@example.com')->send($email);
        return response()->json(['message' => $sent]);
    }
}