@include('navbar')

@section('title', "Página no encontrada")

<style>
body{
    background-image: url('../images/error-4040.png');
    background-size: 1030px;
    background-position: 50px 40px;
}
</style>

    <div class="text" style="margin-top: 300px; margin-left: 310px; font-family: Arial;">
        <h3>La página que intentas encontrar</h3>
        <h3>no esta en el servidor(Error 404)</h3>
    </div>
    <div class="text" style="margin-left: 350px;">
        <strong>
            <p><li style="color: #ff33cc"><a href="{{ url('/') }}" style="color: #ff33cc" class="card-link">Inicio</a></li></p>
            <p><li style="color: #ff33cc"><a href="{{ url('/users') }}" style="color: #ff33cc" class="card-link">Lista de usuarios</a></li></p>
            <p><li style="color: #ff33cc"><a href="{{ url('/users/new') }}" style="color: #ff33cc" class="card-link">Crear usuarios</a></li></p>
        </strong>
    </div>