<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Modificar Usuario</h3>
    </div>
    @include('mensajes.errors')
    <!-- /.box-header -->
    <!-- form start -->
    {!! Form::model($user,['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
    <div class="box-body">
        @include('users.partials.fields_usuario')
        <div class="form-group">
            {!! Form::label('unidades', 'Unidades') !!}
            {!! Form::select('unidades', $unidades, $user->id_unidad, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('roles', 'Roles Del Usuario') !!}<br/>
            @foreach($roles as $rol)
                @if (count($user_roles)>0 && in_array($rol->name, $user_roles))
                    <label class="checkbox-inline">{!! Form::checkbox('roles[]', $rol->name, true) !!} {{$rol->name}}</label>
                @else
                    <label class="checkbox-inline">{!! Form::checkbox('roles[]', $rol->name, false) !!} {{$rol->name}}</label>
                @endif
            @endforeach
        </div>
        <div class="form-group">
            {!! Form::label('estados', 'Estados') !!}
            {!! Form::select('estados', $estados, $user->id_estado, ['class' => 'form-control']) !!}
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        {!! Form::submit('Modificar Usuario', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>