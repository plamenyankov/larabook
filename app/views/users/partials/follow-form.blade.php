@if(Auth::user())
@if($user->isFollowedBy($currentUser))
{{Form::open(['method'=>'DELETE', 'route'=>['follow_path',$user->id]])}}
{{Form::hidden('userIdToUnfollow',$user->id)}}
<button type="" class="button tiny round alert">Unfollow {{$user->username}} </button>
{{Form::close()}}
@else
{{Form::open(['route'=>'follows_path'])}}
{{Form::hidden('userIdToFollow',$user->id)}}
<button type="submit" class="button round tiny">Follow {{$user->username}} </button>
{{Form::close()}}
@endif
@ednif