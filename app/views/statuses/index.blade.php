@extends('layouts.default')
@section('content')
<div class="row">
<div class="large-6 large-offset-3 columns">
    @if($errors->any())
    <div data-alert class="alert-box alert radius">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif
    @include('statuses.partials.publish-status-form')
    </div>
    </div>
<div class="row">
<div class="large-6 large-offset-3 columns">

    @include('statuses.partials.statuses')
    </div>
</div>
@stop