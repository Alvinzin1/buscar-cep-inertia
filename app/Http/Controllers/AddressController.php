<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\Address\SaveRequest;
use App\Http\Requests\Address\SearchRequest;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function index()
    {
        return inertia('HomePage', [
            'adresses' => Address::all()
        ]);
    }

    public function create()
    {
        return inertia('Address/Create');
    }

    public function search(SearchRequest $request){
        $cepApi = $request->input('cepApi');
        
        $response = Http::get("viacep.com.br/ws/$cepApi/json/")->json();
        
        if (isset($response['erro'])) {
            return to_route('create')->withErrors([
                'cepApi' => 'O CEP: ' . $cepApi . ' não foi identificado.'
            ]);
        }else{
            return to_route('create')->with([
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
        
        $repeated_address = Address::where('cep', $request->cep)->first();
        
        if(isset($repeated_address)){
            return to_route('create')->withErrors([
                'cep' => 'O CEP: ' . $request->cep . ' já está cadastrado.' 
            ]);
        }else{
            Address::create([
                'cep' => $request->cep,
                'logradouro' => $request->logradouro,
                'bairro' => $request->bairro,
                'localidade' => $request->localidade,
                'uf' =>$request->uf,
                'ddd' =>$request->ddd,
                'numero' => $request->numero
            ]);

            return redirect()->route('index');
        }
    }
}
