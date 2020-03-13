@include('navbar')

@section('title', "Usuario {{$user->id}}")

    <h1>Usuario {{ $user->id }}</h1>
 
    <p>Nombre del usuario: {{ $user->name }} {{ $user->lastName }}</p>
    <p>Correo electrónico: {{ $user->email }}</p>

    <p>
        <a href="{{ route('users.index') }}" style="color: #ff33cc">Regresar a la lista de usuarios</a>
        
    </p>
