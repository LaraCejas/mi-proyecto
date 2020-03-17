@include('navbar')

<div class="row p-4 justify-content-center" style="height: 100%;" id='background'>
    <div class="card shadow p-3 my-5 bg-white rounded">

        <div class="card-header">
            <title>Listado de usauarios</title>
                <div class="text-center">
                    <h1 style="color: #8f00b3">{{ $title }}</h1>
                </div>

        @if ($users->isNotEmpty())
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
        </div>

        <div class="card-body">
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastName }}</th>
                        <td>{{ $user->email }}</td>
                            <td>
                                <form  method="POST" action="{{ route('users.destroy', $user) }}">
                                    {{ csrf_field() }}
                                    {{ method_field("DELETE") }}
                                    <a href="{{ route('users.show', $user) }}" class="btn btn-link" style="color: #ff33cc"><span class="oi oi-info"></span></span></a>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-link" style="color: #ff33cc"><span class="oi oi-pencil"></span></a>
                                    <button type="submit" class="btn btn-link" style="color: #ff33cc"><span class="oi oi-trash"></span></button>
                                </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay usuarios registrados.</p>
    @endif
        </div>
    </div>
</div>