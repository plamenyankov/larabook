@extends('layouts.default')

@section('content')


<div class="large-6 columns">
    <h1>Register!</h1>
@if($errors->any())
<div data-alert class="alert-box alert radius">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
    </div>
@endif
{{Form::open(['route'=>'register_path'])}}
<div class="panel radius">
{{Form::label('username','Username:')}}
{{Form::text('username',null)}}
{{Form::label('email','Email:')}}
{{Form::text('email', null)}}
{{Form::label('password','Password:')}}
{{Form::password('password',null)}}
{{Form::label('password_confirmation','Password Confirmation:')}}
{{Form::password('password_confirmation',null)}}
{{Form::submit('Sign Up',['class'=>'button'])}}
</div>
{{Form::close()}}
</div>
@stop