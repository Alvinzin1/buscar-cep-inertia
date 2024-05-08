<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\SaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function index()
    {
        $cepData = session('cepData');

        return inertia('Search', [
            'cepData' => $cepData
        ]);
    }

    public function search(Request $request){
        $cep = $request->input('cep');
        
        $response = Http::get("viacep.com.br/ws/$cep/json/")->json();
        
        if (isset($response['erro'])) {
            return redirect()->route('index')->withErrors([
                'cep' => 'O CEP: ' . $cep . ' não foi identificado.' 
            ]);
        }else{
            return redirect()->route('index')->with([
                'cepData' => [
                    'cep' => $response['cep'],
                    'logradouro' => $response['logradouro'],
                    'bairro' => $response['bairro'],
                    'localidade' => $response['localidade'],
                    'uf' => $response['uf'],
                    'ddd' => $response['ddd']
                ]
            ]);
        }
    }

    public function save(SaveRequest $request){
        dd($request->validated());
    }
}
