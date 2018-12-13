@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Permissions</h3>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $key => $user)
                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>
                            <a name="link_view_permission_{{$key}}" href="{{route('admin.permissions.show', ['id'=>$permission->id])}}">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection