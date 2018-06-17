@extends('layouts.app')

@section('content')
    <h1> Search in Database </h1>
    <div class="container" style="padding: 0px; margin: auto;max-width: 20%;">


        {!! Form::open(['method'=>'POST', 'action'=>'AddMoreController@store','files'=>'true'])!!}

        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('PMID') }}
            {!! Form::text('PMID',null,['class'=>'form-control name_list']) !!}

        </div>

        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('Author ') }}
            {!! Form::text('Author',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('Affiliation ') }}
            {!! Form::text('Affiliation',null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('Journal ') }}
            {!! Form::text('Title',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('DateRevised ') }}
            {!! Form::text('DateRevised',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('ArticleTitle ') }}
            {!! Form::text('ArticleTitle',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('Abstract ') }}
            {!! Form::text('Abstract',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('PubDate ') }}
            {!! Form::text('PubDate',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {{ csrf_field() }}
            {{ Form::label('ArticleId ') }}
            {!! Form::text('ArticleId',null,['class'=>'form-control']) !!}
        </div>
        {{--<div class="form-group">--}}
            {{--{{ csrf_field() }}--}}
            {{--{{ Form::label('File Upload') }}--}}
            {{--{!! Form::file('file',['class'=>'form-control']) !!}--}}
        {{--</div>--}}

        <div class="form-group">
            {!! Form::submit('submit',['class'=>'btn btn-success']) !!}


    </div>

    {!! Form::close() !!}
