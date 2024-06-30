<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        try {
            // Verificar si el usuario tiene ventas asociadas
            if ($user->ventas()->exists()) {
                return redirect()->route('users.index')->with('error', 'No se puede eliminar el usuario porque tiene ventas asociadas.');
            }

            // Verificar si el usuario tiene ingresos asociados
            if ($user->ingresos()->exists()) {
                return redirect()->route('users.index')->with('error', 'No se puede eliminar el usuario porque tiene ingresos asociados.');
            }

            // Si no tiene ventas ni ingresos asociados, proceder a eliminar el usuario
            $user->delete();

            return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');

        } catch (QueryException $e) {
            // Verificar si hay restricciones de clave externa (foreign key constraint)
            if ($e->errorInfo[1] == 1451) {
                return redirect()->route('users.index')->with('error', 'No se puede eliminar el usuario debido a restricciones de clave externa.');
            }

            // Otro tipo de excepción
            return redirect()->route('users.index')->with('error', 'Ocurrió un error al intentar eliminar el usuario.');
        }
    }
}
