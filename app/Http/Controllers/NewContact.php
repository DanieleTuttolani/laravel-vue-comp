<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    }
}