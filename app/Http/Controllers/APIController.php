<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function ListaUsuario()
    {
    	$json = [
        
        'usuario' => [
        	'nome' => 'Leonardo',
        	'idade' => 23
        ],
        'usuario2' => [
        	'nome' => 'Vinicius',
        	'idade' => 25
        ]

        ];

        return response($json, 201)
        ->header('Content-Type', 'application/json');
    }

    public function ListaClientes()
    {
        $clientes = Clientes::all();
    
        return response($clientes, 201)
        ->header('Content-Type', 'application/json');

    }

    public function ListaCliente($id)
    {
        $clientes = Clientes::find($id);
    
        return response($clientes, 201)
        ->header('Content-Type', 'application/json');

    }

    public function CadastraCliente(Request $data)
    {
        $clientes = Clientes::create([
        'nome'  => $data->nome,
        'cnpj'  => $data->cnpj
        ]);

        return response($clientes, 201)
        ->header('Content-Type', 'application/json');    

    }


    public function DeleteCliente($id)
    {

        $clientes = Clientes::find($id);

        $clientes->delete();

        return response($clientes, 201)
        ->header('Content-Type', 'application/json');    

    }

    public function AlteraCliente(Request $data)
    {
        $clientes = Clientes::find($data->id);

        $clientes->nome = $data->nome;
        $clientes->cnpj = $data->cnpj;
        $clientes->save();

        return response($clientes, 201)
        ->header('Content-Type', 'application/json');    

    }
}


