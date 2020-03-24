@include('navbar')

@section('title', "Editar usuario")

@if ($errors ?? ''->any())
        <div class="alert alert-danger">
            <h6>Por favor corrige los errores debajo:</h6>
            <ul>
                @foreach ($errors ?? ''->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url("users/{$user->id}") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

    <div class="row p-4 justify-content-center" style="height: 100%;" id='background'>
        <div class="card shadow p-3 my-5 bg-white rounded">
            <div class="card-header">
                <div class="col-md-12">
                <div class="text-center">
                    <h1 style="color: #8f00b3">Editar usuario</h1>
                </div>
                </div>
            </div>
            <div class="card-body">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" style="color: #ff33cc">Nombre</label>
                        <input type="text" name="name" class="form-control" id="name" value= "{{ old('name', $user->name) }}" required 
                        style="border-color: #8f00b3">
                            <div class="invalid-feedback">
                                @if($errors ?? ''->has('name'))
                                 <p>{{ $errors ?? ''->first('name') }}</p>
                                 El nombre es obligatorio
                                @endif  
                            </div>  
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName" style="color: #ff33cc">Apellido</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" value= "{{ old('lastName', $user->lastName) }}" required
                        style="border-color: #8f00b3">
                            <div class="invalid-feedback">
                                @if($errors ?? ''->has('lastName'))
                                 <p>{{ $errors ?? ''->first('lastName') }}</p>
                                 El apellido es obligatorio
                                @endif  
                            </div> 
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email" style="color: #8f00b3">Correo electronico</label>
                        <input type="email" name="email" class="form-control" id="email" value= "{{ old('email', $user->email) }}" required 
                        style="border-color: #ff33cc">
                            <div class="invalid-feedback">
                                @if($errors ?? ''->has('email'))
                                 <p>{{ $errors ?? ''->first('email') }}</p>
                                 El correo electronico es obligatorio
                                @endif  
                            </div> 
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password" style="color: #8f00b3">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password"
                        style="border-color: #ff33cc">
                    </div>
                </div>

            </div>
            <div class="card-footer text-muted">
            <div class="d-flex justify-content-between ">
                <a href="{{ route('users.index') }}" style="color: #8f00b3; margin: auto">Regresar a la lista de usuarios</a>
                <p>
                <button type="submit" class="btn btn-dark rounded-pill" style="color: #ff33cc;">Guardar cambios</button>
                </p>
            </div>
            </div>
        </div>  
        </div> 
    </form>
