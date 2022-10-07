<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Client;
use App\Models\City;
use Illuminate\Http\Request;
use Exception;

class ClientesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('Clientes.clientes-index',compact('cities'));
    }

    public function sendCliente(Request $request)
    {
        try {
            $request->validate([
                'tipoCliente' => 'required',
                'NIT' => 'required',
                'nombre' => 'required',
                'mail' => 'required',
                'ciudad' => 'required',
                'direccion' => 'required',
                'tel1' => 'required',
                'tel2' => 'required'
            ]);

            $cliente = new Client;
            $cliente->client_type = $request->tipoCliente;
            $cliente->name = $request->nombre;
            $cliente->nit = $request->NIT;
            $cliente->email = $request->mail;
            $cliente->phone_number_1 = $request->tel1;
            $cliente->phone_number_2 = $request->tel2;
            $cliente->created_by = auth()->user()->id;
            $cliente->save();

            $address = new Address;
            $address->address_line = $request->direccion;
            $address->client_id = $cliente->id;
            $address->city_id = $request->ciudad;
            $address->save();

    
            return back()->with('success','Registro Realizado Exitosamente');

        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
            //throw new Exception($th->getMessage());
        }
        
    }
}
