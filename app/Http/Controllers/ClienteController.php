<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Laravel\SerializableClosure\Serializers\Native;

class ClienteController extends Controller {
    private Cliente $cliente;
    
    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function index (Request $request) {

        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientePesquisarIndex(search: $pesquisar ?? '');
        
        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete(Request $request) {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(FormRequestCliente $request) {

        if ($request->method() == "POST") {
            $data = $request->all();
            $componentes = new Componentes();
            Cliente::create($data);

             Toastr::success('Cliente cadastrado com sucesso');

            return redirect()->route('cliente.index');
        }
        
        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestCliente $request, $id) {

        if ($request->method()== "PUT") {
            $data = $request->all();
            $componentes = new Componentes();

            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Atualizado com sucesso');

            return redirect()->route('cliente.index');
        }
        
        $findCliente = Cliente::where('id','=', $id)->first();

        
        return view('pages.clientes.atualiza', compact('findCliente'));
        
}
}