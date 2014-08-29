<div class="panel-status radius">

    {{Form::open(['route'=>'statuses_path'])}}
    {{Form::label('body','Status')}}
    {{Form::textarea('body',null,['class'=>'status-txt','placeholder'=>'What\'s on your mind?'])}}
    {{Form::submit('Post Status',['class'=>'button tiny right radius round'])}}

    {{Form::close()}}
</div>