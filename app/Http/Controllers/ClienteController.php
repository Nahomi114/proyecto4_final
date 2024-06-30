<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::paginate(20);
        return view('clientes.index', compact('clientes'));
    }

    public function create() {
        return view('clientes.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'Nom_cliente' => 'required|string|max:255',
            'Ape_cliente' => 'required|string|max:255',
            'Tipo_documento' => 'required|string|max:50',
            'DNI_cliente' => 'required|string|max:20|unique:clientes,DNI_cliente',
            'Cel_cliente' => 'required|string|max:20',
            'Correo_cliente' => 'required|string|email|max:255|unique:clientes,Correo_cliente'
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    public function edit(Cliente $cliente) {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente) { 
        $request->validate([
            'Nom_cliente' => 'required|string|max:255',
            'Ape_cliente' => 'required|string|max:255',
            'Tipo_documento' => 'required|string|max:50',
            'DNI_cliente' => 'required|string|max:20|unique:clientes,DNI_cliente,'.$cliente->ID_clientes.',ID_clientes',
            'Cel_cliente' => 'required|string|max:20',
            'Correo_cliente' => 'required|string|email|max:255|unique:clientes,Correo_cliente,'.$cliente->ID_clientes.',ID_clientes'
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente) { 
        try {
            // Verificar si el cliente tiene ventas asociadas
            if ($cliente->ventas()->exists()) {
                return redirect()->route('clientes.index')->with('error', 'No se puede eliminar el cliente porque está relacionado en cascada con ventas.');
            }
    
            // Si no tiene ventas asociadas, proceder a eliminar el cliente
            $cliente->delete();
    
            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    
        } catch (BadMethodCallException $e) {
            // Manejar la excepción BadMethodCallException
            return redirect()->route('clientes.index')->with('error', 'No se puede eliminar el cliente en este momento.');
    
        } catch (QueryException $e) {
            // Si ocurre una excepción por restricción de clave externa (foreign key constraint)
            if (DB::getDriverName() == 'mysql' && $e->errorInfo[1] == 1451) {
                return redirect()->route('clientes.index')->with('error', 'No se puede eliminar el cliente porque está relacionado en cascada con ventas.');
            }
    
            // Si ocurre otro tipo de excepción, podrías manejarla de acuerdo a tus necesidades
            return redirect()->route('clientes.index')->with('error', 'Ocurrió un error al intentar eliminar el cliente.');
        }
    }
    
}

