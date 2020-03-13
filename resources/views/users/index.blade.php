@include('navbar')
<title>Listado de usauarios</title>
<body>

    <div class="text-center">
        <h1 style="color: #8f00b3">{{ $title }}</h1>
    </div>

    @if ($users->isNotEmpty())
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.show', $user) }}" style="color: #ff33cc">Ver detalles</a>
                <a href="{{ route('users.edit', $user) }}" style="color: #ff33cc">Editar usuario</a>
                <form  method="POST" action="{{ route('users.destroy', $user) }}">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                    <button type="submit">Eliminar usuario</button>
                </form>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay usuarios registrados.</p>
    @endif
</body>