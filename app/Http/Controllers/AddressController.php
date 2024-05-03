<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class AddressController extends Controller
{
    public function index()
    {
        return inertia('Search');
    }

    public function search(Request $request){
        $cep = $request->input('cep');

        $response = Http::get("viacep.com.br/ws/$cep/json/")->json();

        return inertia('Search', [
            'cepData' => $response
        ]);
    }
}
