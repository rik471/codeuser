@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Users</h3>

        <a href="{{ route('admin.users.create') }}">Create User</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->title}}</td>
                        <td>
                            <a name="link_edit_post_{{$key}}" href="{{route('admin.user.edit', ['id'=>$user->id])}}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection