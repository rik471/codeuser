@extends('layouts.app')

@section('content')


    <div class="container">

        <h3>Edit User</h3>

        {!! Form::open(['method'=>'put','route' => [ 'admin.users.update', 'id' => $user->id ]]) !!}

        <div class="form-group">
            {!! Form::label('name', "Name:") !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Email', "E-mail:") !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('roles[]', "Roles:") !!}
            {!! Form::select('roles[]', $roles, $user->roles->lists('id')->toArray(),
                ['class'=>'form-control', 'multiple' => 'multiple']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection