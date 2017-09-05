@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))

        <p class="alert-danger">{{session('deleted_user')}}</p>

    @endif

    <h1>Users</h1>

    <table class="table">
       <thead>
         <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Photo</th>
             <th>Email</th>
             <th>Role</th>
             <th>Active</th>
             <th>Created At</th>
             <th>updated At</th>
         </tr>
       </thead>
       <tbody>

       @if($users)

           @foreach($users as $user)
            <tr>
             <td>{{$user->id}}</td>
             <td><a href="{{route('users.edit', $user->id)}}"> {{$user->name}}</a></td>
             <td><img height="50" width="50" src="{{$user->photo? $user->photo->file : "profile.png"}}"></td>
             <td>{{$user->email}}</td>
             <td>{{$user->role->name}}</td>
                <td>{{$user->is_active? 'Active' : 'Not Active'}}</td>
             <td>{{$user->created_at->diffForHumans()}}</td>
             <td>{{$user->updated_at->diffForHumans()}}</td>
         </tr>

       @endforeach
           @endif

       </tbody>
     </table>

@endsection