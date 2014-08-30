@extends('layouts.default')

@section('content')
<div class="large-12 columns top-pad-20">

<div class="panel">

    <h1 class="welcome">Welcome to Larabook!</h1>

    <p>Welcome to the premier place to talk about Laravel with others. Why don't you sign up to see what all the fuss is about!</p>
    @if(!$currentUser)
    <p>
        {{link_to_route('register_path','Sign Up',null,['class'=>'button','role'=>'sign up'])}}
    </p>
    @endif
</div>
</div>
@stop