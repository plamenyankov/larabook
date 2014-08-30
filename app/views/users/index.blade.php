@extends('layouts.default')
@section('content')
<h1>All Users</h1>
@foreach($users->chunk(4) as $usersSet)
<div class="row">
@foreach($usersSet as $user)
<div class="large-3 medium-4 small-6 columns user-block">
    @include('layouts.partials.avatar',['size'=>60,'currentUser'=>$user])
   <h4>{{link_to_route('profile_path',$user->username,$user->username)}}</h4>
</div>
@endforeach
</div>
@endforeach
{{$users->links()}}
@stop