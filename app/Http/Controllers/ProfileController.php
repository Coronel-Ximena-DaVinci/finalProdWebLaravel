<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'usuario' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        /**
         * @var User $usuario
         */
        $usuario = Auth::user();

        $request->validate($this->rules($usuario));

        $usuario->fill($request->all());
        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();

        return redirect()->route('profile.edit')->with('message', 'Perfil actualizado');
    }

    protected function rules($usuario = null)
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $usuario->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ];
    }

}
