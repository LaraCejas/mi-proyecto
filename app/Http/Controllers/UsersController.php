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

    public function show($id)
    {
        $user = User::find($id);
        
        return view('users.show', compact('user'));
    }
    
    public function listaVacia()
    {
        return 'No hay usuarios registrados';
    }

    public function createUser()
    {
        return 'Crear usuario nuevo';
    }
}
