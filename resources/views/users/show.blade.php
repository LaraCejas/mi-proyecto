@include('navbar')

@section('title', "Usuario {{$user->id}}")

<div class="row p-4 justify-content-center" style="height: 100%;" id='background'>
    <div class="card shadow p-3 my-5 bg-white rounded">

        <div class="card-header">
            <div class="text-center">
                <h1 style="color: #8f00b3">Usuario {{ $user->id }}</h1>
            </div>    
        </div>
        <div class="card-body">

            <th scope="row">
                <p><strong>Nombre del usuario:</strong> {{ $user->name }} {{ $user->lastName }}</p>
            </th>
            <th scope="row">
                <p><strong>Correo electrónico:</strong> {{ $user->email }}</p>
            </th>

        </div>

        <div class="card-footer">
            <div class="text-center">
                <a href="{{ route('users.index') }}" style="color: #ff33cc">Regresar a la lista de usuarios</a>
            </div>
        </div>
    </div>
</div>
