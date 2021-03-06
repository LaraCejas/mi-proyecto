@include('navbar')

@section('title', "Crear usuario")


@error('name')
    <div class="invalid-feedback">
        El nombre es obligatorio
    </div>
@enderror

@error('lastName')
    <div class="invalid-feedback">
        El apellido es obligatorio
    </div>
@enderror

@error('email')
    <div class="invalid-feedback">
        El correo electronico es obligatorio
    </div>
@enderror

@error('password')
    <div class="invalid-feedback">
        La contraseña es obligatoria
    </div>
@enderror

    <form method="POST" action="{{ url('users/create') }}">
        {{ csrf_field() }}

    <div class="row p-4 justify-content-center" style="height: 100%;" id='background'>
        <div class="card shadow p-3 my-5 bg-white rounded">
            <div class="card-header">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 style="color: #8f00b3">Crear usuario</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" id="name" value= "{{ old('name') }}" required 
                        style="border-color: #ff33cc">
                              
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Apellido</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" required
                        style="border-color: #ff33cc">
                            
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo electronico</label>
                        <input type="email" name="email" class="form-control" id="email" value= "{{ old('email') }}" required 
                        style="border-color: #ff33cc">
                             
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3" 
                            style="border-color: #ff33cc; background-color: #ffa9e9; color: #ffffff;"
                            ><span class="oi oi-key" color: #ff33cc></span></span>
                            </div>
                        <input type="password" name="password" class="form-control" id="password" required
                        style="border-color: #ff33cc">
                            
                            </div> 
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row justify-content-center">
                    <a href="{{ route('users.index') }}" class="btn btn_link" style="color: #ff33cc"><span class="oi oi-x"></span></a>
                    <button type="submit" class="btn btn-link" style="color: #ff33cc"><span class="oi oi-check"></span></button>
                </div>        
            </div>
        </div>  
        </div> 
    </form>  

