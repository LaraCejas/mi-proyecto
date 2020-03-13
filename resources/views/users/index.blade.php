@include('navbar')
<title>Listado de usauarios</title>
<body>

    <h1>{{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
            <li>
                {{ $user->name }} {{ $user->lastName }}, ({{ $user->email }})
                <a href="{{ route('users.show', $user) }}" style="color: #ff33cc">Ver detalles</a>
                <a href="{{ route('users.edit', $user) }}" style="color: #ff33cc">Editar usuario</a>
            </li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
</body>