@include('navbar')

@section('title', "Usuario {{$user->id}}")

    <h1>Usuario {{ $user->id }}</h1>
 
    <p>Nombre del usuario: {{ $user->name }}</p>
    <p>Correo electrónico: {{ $user->email }}</p>

    <p>
        <a href="{{ route('users.index') }}" style="color: #ff33cc">Regresar a la lista de usuarios</a>
        <br>
        <br>
        <button type="button" class="btn-btn rounded-pill" style="background-color: #ff33cc">Eliminar usuario</button>
    </p>
