<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<div class="row">
    <div class="col-lg-12 col-xs-12">
        <h2>Usuarios</h2>
        <div class="form-group col-lg-2">
            <a class="btn btn-info paginacion" href="{{ route('admin.users.create') }}" role="button">Nuevo Usuario</a>
        </div>
        <div class="form-group col-lg-2">
            <h5>Hay {{ $users->total() }} Usuarios</h5>
        </div>
        {!! Form::model(Request::only(['nombres']), ['route' => 'admin.users.index', 'method' => 'GET', 'role' => 'search']) !!}
        <div class="form-group col-lg-6">
            {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre o apellido del usuario a buscar']) !!}
        </div>
        <div class="form-group col-lg-2">
            <button type="submit" class="btn btn-default">Buscar</button>
        </div>
        {!! Form::close() !!}
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>CI</th>
                <th>Correo Electrónico</th>
                <th>Unidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->apellidoP }}</td>
                    <td>{{ $user->apellidoM }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->ci}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->unidad }}</td>
                    <td>{{ $user->nombre_estado }}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.users.edit', $user->id], 'id' => 'formulario', 'method' => 'GET']) !!}
                            {!! Form::submit('Editar', ['class' => 'btn btn-primary btn-xs']) !!}
                        {!! Form::close() !!}
                        @if($user->id_estado == 1)
                            {!! Form::open(['route' => ['deshabilitar_usuario', $user->id], 'method' => 'GET']) !!}
                                {!! Form::submit('Deshabilitar', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        @elseif($user->id_estado == 2)
                            {!! Form::open(['route' => ['habilitar_usuario', $user->id], 'method' => 'GET']) !!}
                                {!! Form::submit('Habilitar', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $users->appends(Request::only(['nombres']))->render() !!}
    </div>
</div>
<script>
    /*
    $('#formulario').submit(function() {
        //console.log($(this).serialize())
        //alert('hola');
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                //$('#respuesta').html(data);
                //alert(data);
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        });
        return false;
    });*/

            $(function(){
                $(".paginacion").click(function (){
                    var ruta=$(this).attr("href");
                    $( ".content" ).empty();
                    $(".content").load(ruta);
                    return false;
                });
            });

</script>

