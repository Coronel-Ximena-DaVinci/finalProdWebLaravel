<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = User::query()->with(['role']);

        if ($request->name) {
            $usuarios->where('name', 'like', '%' .  $request->name . '%');
        }

        if ($request->email) {
            $usuarios->where('email', 'like', '%' .  $request->email . '%');
        }

        $request->session()->flashInput($request->all());
        return view('admin.users.index', [
            'usuarios' => $usuarios->paginate(5),
            'roles' => Role::query()->pluck('name', 'id'),
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.users.create', [
            'roles' => Role::query()->pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $usuario = new User();
        $this->save($usuario, $request);

        return redirect()->route('admin.users.index')->with('message', 'Usuario creado');
    }

    public function edit(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.users.edit', [
            'usuario' => $usuario,
            'roles' => Role::query()->pluck('name', 'id'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $request->validate($this->rules($usuario));

        $this->save($usuario, $request);

        return redirect()->route('admin.users.index')->with('message', 'Usuario modificado');
    }

    protected function save(User $usuario, Request $request)
    {
        $usuario->fill($request->all());
        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();
    }

    public function delete(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.users.index')->with('message', 'Usuario eliminado');
    }

    protected function rules($usuario = null)
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . ($usuario ? $usuario->id : 'NULL')],
            'password' => [$usuario ? 'nullable' : 'required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['required', 'exists:roles,id'],
        ];
    }
}
