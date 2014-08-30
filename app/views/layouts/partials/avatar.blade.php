<a href="{{route('profile_path',$user->username)}}">
<img class="img-circle avatar" src="{{$user->present()->gravatar(isset($size)?$size:30)}}" />
</a>
