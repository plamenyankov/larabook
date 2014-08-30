@extends('layouts.default')
@section('content')
<div class="row">
<div class="large-4 columns">
    <div  class="row media">
    <div class="large-4 columns">@include('layouts.partials.avatar',['size' => 50])</div>
    <div class="large-8 columns pull-2"><h3 class="left">{{$user->username}}</h3>
    </div>
        <div class="column">
            <small  class="subheader push-2">
                {{$user->present()->followersCount()}}
            </small>
            <small  class="subheader push-2">
                {{$user->present()->statusCount()}}
            </small></div>
    </div>
    @unless($user->is($currentUser))
    <div class="push-2">@include('users.partials.follow-form')</div>
    @endif
</div>
    <div class="column">
        @foreach($user->follower as $follower)
        @include('layouts.partials.avatar',['size' => 25,'user'=>$follower])
        @endforeach
    </div>
    <div class="large-6 pull-2 columns">
        @if($currentUser and $user->is($currentUser))
        @include('statuses.partials.publish-status-form')
        @endif
        @include('statuses.partials.statuses',['statuses'=>$user->statuses])
    </div>

</div>
@stop