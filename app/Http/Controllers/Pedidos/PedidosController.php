<?php

namespace App\Http\Controllers\Pedidos;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Pedidos\Pedido_Cabeza;
use App\Models\Pedidos\Pedido_Detalle;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $data = User::find(auth()->user()->id)->pedidos()->paginate(10);
        // return $data;
        return view('pedidos.pedidos-index',['data' => $data]);
    }

    public function create()
    {
        $clients = Client::paginate(10);
        return view('pedidos.pedidos-select-client-table',['clients' => $clients]);
    }

    public function createPedido($id)
    {
        try {
            $pedido = new Pedido_Cabeza;
            $pedido->fecha_registro = now();
            $pedido->estado = 'ABIERTO';
            $pedido->client_id = $id;
            $pedido->user_id = auth()->user()->id;
            $pedido->save();
            return redirect()->route('pedidos.create.products',$pedido->id)
                    ->with('success', 'Pedido creado con el ID'.$pedido->id);
        } catch (\Throwable $th) {
            return redirect()->route('pedidos.create')->withErrors($th->getMessage());
            // return back()->withErrors($th->getMessage());
        }
    }

    public function detail($id)
    {
        $cabeza = Pedido_Cabeza::find($id);
        $cliente = $cabeza->client()->first();
        $detalles = $cabeza->detalles()->paginate(10);

        $products = Product::with([
            'prices' => fn($query) => $query->where('type', $cliente->client_type)
        ])->paginate(10);

        return view('pedidos.pedidos-add-details', [
            'cabeza' => $cabeza,
            'detalles' => $detalles,
            'products' => $products
        ]);
    }

    public function createProduct(Request $request, $pedido)
    {
        try {
            $detail = new Pedido_Detalle;
            $detail->cantidad = $request->cantidad;
            $detail->bonificadas = $request->bonificadas;
            $detail->id_producto = $request->idProd;
            $detail->id_cabeza = $pedido;
            $detail->save();
            return back()->with('success','Producto Registrado Con Exito');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }

        return $request;
    }

    public function show($id)
    {
        return $id;
    }

    public function delete($id)
    {
        return $id;
    }
}
