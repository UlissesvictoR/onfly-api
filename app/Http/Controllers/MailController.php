<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Maill;
use App\Mail\MailNotify;



class MailController extends Controller
{

    public function index($mail)
    {

        $data = [
            'subject' => 'Registro de Despesas',
            'body'    => 'Despesas cadastradas com sucesso!'
        ];

        try {
            Mail::to($mail)->send(new MailNotify($data));
            return response()->json(['Email enviado.']);
        } catch (\Exception $exception){
            return response()->json(['Erro ao enviar email.']);
        }

    }

}
