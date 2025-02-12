<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function returnHome() {
        $myVar = 'Hello World';

        $myName = 'Rafaela';

        $shoppinList = ['chocolate', 'maça', 'banana'];

        $contactInfo = [
            'nome' => 'Rafaela',
            'email' => 'rafaelah05@hotmail.com'
        ];

                
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciriaco Cardoso',
            'email' => 'cesae@cesae.pt'
        ];

        return view('view_home', compact('myVar', 'myName', 'shoppinList', 'contactInfo', 'cesaeInfo'));
    }
}
