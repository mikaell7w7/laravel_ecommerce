<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return "Olá index";
    }


    public function getExemplo()
    {
        return "Olá";
    }

    public function getExemploSuper()
    {
        return "Olá";
    }

    public function getLogin(){

        $data = [

            'email' => 'mikaell.7w7@gmail.com',
            'password' => 'fran2505'

        ];

        if(Auth::attempt($data)){

            return "logou";
        }
            return "falhou";

    }


    public function getLogado(){

            if(Auth::check()){
                return "Logado";
            }

                return "Não está logado";

        }

    public function getLogout (){
        Auth::logout();
    }



}
