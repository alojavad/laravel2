@extends('layout.lnews')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
    <br>
    <br>
    <br>
<form class="form-horizontal" role="form" method="post" action="{{ URL::to('/') }}/news">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="InputTitle">Title</label>
        <input type="text" class="form-control" id="InputTitle" name="title" placeholder="Title">
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
        <input type="text" class="form-control" id="InputRefre" name="refre" placeholder="Refre">
    </div>
    <div class="form-group">
        <label for="InputTitle">Image</label>
        <input type="text" class="form-control" id="InputImage" name="image" placeholder="Image">
    </div>
    <div class="form-group">
        <label for="InputDesc">Abstract</label>
        <textarea class="form-control" id="InputAbst" name="abst"></textarea>
    </div>

    <div class="form-group">
        <label for="InputDesc">Description</label>
        <textarea class="form-control" id="InputDesc" name="desc"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
<script>
    CKEDITOR.replace('desc');
</script>
    </div>
@endsection