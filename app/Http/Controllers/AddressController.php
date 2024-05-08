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
        $cepData = session('cepData');

        return inertia('Search', [
            'cepData' => $cepData,
            'adresses' => Address::all()
        ]);
    }

    public function search(SearchRequest $request){
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
        
        $repeated_address = Address::where('cep', $request->cep)->first();
        
        if(isset($repeated_address)){
            return redirect()->route('index')->withErrors([
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
