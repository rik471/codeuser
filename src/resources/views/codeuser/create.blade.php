@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Create User</h3>

        {!! Form::open(['method'=>'post', 'route'=> 'admin.users.store']) !!}

        <div class="form-group">
            {!! Form::label('email', "E-mail:") !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('username', "Username:") !!}
            {!! Form::textarea('username', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', "Password:") !!}
            {!! Form::text('password', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection