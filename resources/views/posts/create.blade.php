@extends('layouts.app')

@section('content')
    <h1> Search XML files</h1>

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
</style>

        <div class="container" style=" padding: 0px; margin: auto;max-width: 20%;background-color: lemonchiffon;">




{!! Form::open(['method'=>'POST', 'action'=>'PostController@store','files'=>'true'])!!}

<div class="form-group" >
    {{ csrf_field() }}
        {!! Form::text('search',null,['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {{ csrf_field() }}
        {!! Form::file('file',['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::submit('submit',['class'=>'form-control']) !!}
</div>

</div>

{!! Form::close() !!}
