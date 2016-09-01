<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Nuevo Usuario</h3>
    </div>
    @include('mensajes.errors')
    <!-- /.box-header -->
    <!-- form start -->
    {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST', 'id' => 'formulario']) !!}
        <div class="box-body">
            @include('users.partials.fields_usuario')
            <div class="form-group">
                {!! Form::label('unidades', 'Unidades') !!}
                {!! Form::select('unidades', $unidades, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('roles', 'Roles Del Usuario') !!}<br/>
                @foreach($roles as $rol)
                    <label class="checkbox-inline">{!! Form::checkbox('roles[]', $rol->name) !!} {{$rol->name}}</label>
                @endforeach
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            {!! Form::submit('Crear Usuario', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
<script>
    /*
    $(function(){
        $("#form").submit(function(e){
            var fields = $(this).serialize();
            $.post("{{url('home/validarmiformulario')}}", fields, function(data){
                if(data.valid !== undefined){
                    $("#result").html("Enhorabuena formulario enviado correctamente");
                    $("#form")[0].reset();
                    $("#error_nombre").html('');
                    $("#error_email").html('');
                }
                else
                {
                    $("#error_nombre").html('');
                    $("#error_email").html('');
                    if (data.nombre !== undefined){
                        $("#error_nombre").html(data.nombre);
                    }
                    if (data.email !== undefined){
                        $("#error_email").html(data.email);
                    }
                }

            });

            return false;
        });
    });*/

</script>