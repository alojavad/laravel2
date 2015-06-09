@extends('app')

@section('content')
{!!Form::open(['action'=>'AsksController@store','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
<div class="form-group">
    {!! Form::label('title','Title:',['class'=>'col-sm-3 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('title',Input::old('title'),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('text','Body:',['class'=>'col-sm-3 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('body',Input::old('title'),['class'=>'form-control']) !!}
    </div>
</div>

<div class="text-center">
    {!!Form::submit('Post Your Question',['class'=>'btn btn-default'])!!}
</div>
{!!Form::close()!!}
<br>
<br>
<br>

@stop