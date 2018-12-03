@extends('layouts.app')

@section('content')


    <div class="container">

        <h3>Edit User</h3>

        {!! Form::open(['method'=>'put','route' => [ 'admin.users.update', 'id' => $user->id ]]) !!}

        <div class="form-group">
            {!! Form::label('email',"E-mail:") !!}
            {!! Form::text('email',  $post->title, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Username',"username:") !!}
            {!! Form::textarea('username', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('password', "Password:") !!}
            {!! Form::text('password', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection