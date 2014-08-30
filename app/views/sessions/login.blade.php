@extends('layouts.default')
@section('content')

<div class="large-6 columns">
    <h1>Sign In!</h1>
    @if($errors->any())
    <div data-alert class="alert-box alert radius">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif
    {{Form::open(['route'=>'login_path'])}}
    <div class="panel radius">

        {{Form::label('email','Email:')}}
        {{Form::email('email', null)}}
        {{Form::label('password','Password:')}}
        {{Form::password('password',null)}}

        {{Form::submit('Sign In',['class'=>'button'])}}
    </div>
    {{Form::close()}}
</div>
@stop