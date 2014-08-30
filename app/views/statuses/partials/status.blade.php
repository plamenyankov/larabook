
<article class="status-media">
    <div class="left">
        <a href="{{route('profile_path',$status->user->username)}}"><img class="circle" src="{{$status->user->present()->gravatar}}" alt="{{$status->user->username}}"/>
    </a></div>
    <div class="media-body"><h4 class="media-heading">{{$status->user->username}}</h4></div>
    <div class="time-from-status">{{$status->present()->timeSinceCreation()}}</div>
    {{$status->body}}
</article>
