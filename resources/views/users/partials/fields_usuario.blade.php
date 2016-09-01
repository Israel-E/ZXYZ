<div class="form-group">
    {!! Form::label('apellidoP', 'Apellido Paterno') !!}
    {!! Form::text('apellidoP', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca el Apellido Paterno']) !!}
</div>
<div class="form-group">
    {!! Form::label('apellidoM', 'Apellido Materno') !!}
    {!! Form::text('apellidoM', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca el Apellido Materno']) !!}
</div>
<div class="form-group">
    {!! Form::label('nombre', 'Nombres') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca los Nombres']) !!}
</div>
<div class="form-group">
    {!! Form::label('ci', 'Cédula de Identidad') !!}
    {!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca la Cédula de Identidad']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Correo Electrónico') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca el Correo Electrónico']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Contraseña') !!}
    {!! Form::password('password', ['class' => 'form-control' , 'placeholder' => 'Por favor introduzca su Contraseña']) !!}
</div>