@include('navbar')
<title>Listado de usauarios</title>
<body>

    <h1>{{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
            <li>
                {{ $user->name }}, ({{ $user->email }})
                <a href="{{ url("/users/{$user->id}") }}">Ver detalles</a>
            </li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
</body>