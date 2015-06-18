@extends('layout.lnews')

@section('content')
<div class="col-md-1">
</div>
<div class="col-md-5">
    <br>




    {{ Form::model($news, array('method' => 'put',
    'action' => array('NewsController@update', 'news_id' => $news -> id),
    'role' => 'form'
    )) }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="InputTitle">Title</label>
        <input type="text" class="form-control" id="InputTitle" name="title" placeholder="Title" value="{{$news->title}}">
    </div>
    <div class="form-group">
        <label for="InputType">Type</label>
        <select class="form-control" id="InputType" name="dep">
            <option value="1">خبری</option>
            <option value="2">ورزشی</option>
            <option value="3">تکنولوژی</option>
        </select>
    </div>
    <div class="form-group">
        <label for="InputType">Publish</label>
        <select class="form-control" id="InputType" name="publi">
            <option value="1">عدم انتشار</option>
            <option value="2">اخرین اخبار</option>
            <option value="3">مهمترین اخبار</option>
            <option value="4">خبر ویژه</option>
            <option value="5">تیتر یک</option>
            <option value="6">یادداشت</option>
            <option value="7">گزارش</option>
            <option value="8">گفتگو</option>
            <option value="9">نوع 1</option>
            <option value="10">نوع 2</option>
            <option value="11">نوع 3</option>
        </select>
    </div>
    <div class="form-group">
        <label for="InputTitle">Refrence</label>
        <input type="text" class="form-control" id="InputRefre" name="refre" placeholder="Refre" value="{{$news->refre}}">
    </div>
    <div class="form-group">
        <label for="InputTitle">Image</label>
        <input type="text" class="form-control" id="InputImage" name="image" placeholder="Image" value="{{$news->image}}">
    </div>
    <div class="form-group">
        <label for="InputDesc">Abstract</label>
        <textarea class="form-control" id="InputAbst" name="abst" rows="10">{{$news->abst}}</textarea>
    </div>

    <div class="form-group">
        <label for="InputDesc">Description</label>
        <textarea class="form-control" id="InputDesc" name="desc" rows="10">{{$news->descr}}</textarea>
    </div>
    <button type="submit" class="btn btn-default">Update</button>
    {{ Form::close() }}
    <hr>
    Delete this record
    <br>
    {{ Form::open(array('action' => array('NewsController@destroy', $news -> id), 'method' => 'delete')) }}
    {{ Form::submit('Delete', array('class' => 'btn btn-default')) }}
    {{ Form::close() }}


    <br>
    <br>
    <br>
</div>
<div class="col-md-6">


</div>
@stop