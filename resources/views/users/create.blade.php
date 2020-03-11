@include('navbar')

@section('title', "Crear usuario")

    <form method="POST" action="{{ url('users/create') }}">
        {!! csrf_field() !!}

    <div class="row p-4 justify-content-center" style="height: 100%;" id='background'>
        <div class="card shadow p-3 my-5 bg-white rounded">
            <div class="card-header">
                <div class="col-md-12">
                    <h1 style="color: #ff33cc">Crear usuario</h1>
                </div>
            </div>
            <div class="card-body">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" style="color: #ff33cc">Nombre</label>
                        <input type="text" name="name" class="form-control" id="name" style="border-color: #ff33cc">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName" style="color: #ff33cc">Apellido</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" style="border-color: #ff33cc">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email" style="color: #ff33cc">Correo electronico</label>
                        <input type="email" name="email" class="form-control" id="email" style="border-color: #ff33cc">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password" style="color: #ff33cc">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" style="border-color: #ff33cc">
                    </div>
                </div>

            </div>
            <div class="card-footer text-muted">

                <button type="submit" class="btn-btn rounded-pill" style="background-color: #ff33cc">Crear usuario</button>
                <p>
                    <a href="{{ route('users.index') }}" style="color: #ff33cc">Regresar a la lista de usuarios</a>
                </p>
     
            </div>
        </div>  
        </div> 
    </form>

     


