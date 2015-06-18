@extends('layout.lnews')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
    <br>
    <br>
    <br>
@foreach ($data as $db)
    <p>{{$db->title}}</p>
    <p>{{$db->descr}}</p>
    <a href="{{ action('NewsController@edit',$db->id) }}">Update</a>
    &nbsp;
    <a href="{{ action('NewsController@edit',$db->id) }}">Delete</a>
    <hr>
    @endforeach
</div>
@endsection