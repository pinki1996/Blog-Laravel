@extends('Layouts.app')


@section('content')

<h1>Edit Post</h1>

{{--<form method="POST" action="/posts">--}}

{!!Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id]]) !!}  

    {{csrf_field()}}

    <!-- <input type="hidden", name="_method" value="PUT">

    <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">

    <input type="submit" name="submit" value="UPDATE">
</form> -->
<div class="form-group">
    {!! Form::label('title','Title:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

{{--@csrf--}}
<div class="form-group">
    {!!Form::submit('update Post',['class'=>'btn btn-info']) !!}
    <!-- <input type="text" name="title" placeholder="Enter Title"> -->

    <!-- <input type="submit" name="submit"> -->
</div>    
{!! form::close() !!}

<!-- <form method="POST" action="/posts/{{$post->id}}"> -->

{!!Form::open(['method'=>'DELETE','action'=>['PostController@destroy',$post->id]]) !!}  

{{csrf_field()}}

{!!Form::submit('DElete',['class'=>'btn btn-danger']) !!}

{!! form::close() !!}

<!-- 
    <input type="hidden" name="_method" value="DELETE">

    <input type="submit" value="DELETE">
</form> -->


@endsection

