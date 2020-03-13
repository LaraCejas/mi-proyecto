<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function home() {
        return view('welcome');
    }

    public function index()
    {
        $users = User::all();

        $title= 'Listado de usuarios';

       return view('users.index', compact('title', 'users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'lastName' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
        ] , [
            'name.required' => 'El nombre es obligatorio'
        ]);

        User::create([
            'name' => $data ['name'],
            'lastName' => $data ['lastName'],
            'email' => $data ['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|min:8|max:20',
        ]);

        if($data['password' != null]) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        

        $user->update($data);

        return redirect()->route('users.show', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
