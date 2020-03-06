<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function home() {
        return view('welcome');
    }

    public function index()
    {
        if(request()->has('empty')) {
            $users = [];
        } else {
            $users=[
                'Juan','Pedro','Agustina','Soledad',
            ];
        }
        

        $title= 'Listado de usuarios';

       return view('users', compact('title', 'users'));
    }

    public function show($id)
    {
        return "Mostrar detalle de usuario: {$id}";
    }

    public function createUser()
    {
        return 'Crear usuario nuevo';
    }
}
