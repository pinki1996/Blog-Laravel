@extends('Layouts.app')


@section('content')

<h1>Create Post</h1>
{{--<form method="POST" action="/posts">--}}

{!!Form::open(['method'=>'POST','action'=>'PostController@store','files'=>true]) !!} 

<div class="form-group">
    {!! Form::label('title','Title:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::file('file',['class'=>'form-control']) !!}
</div>

{{--@csrf--}}
<div class="form-group">
    {!!Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    <!-- <input type="text" name="title" placeholder="Enter Title"> -->

    <!-- <input type="submit" name="submit"> -->
</div>    
{!! form::close() !!}


@if(count($errors)>0)

<div class="alert-danger">

    <ul>
        @foreach($errors->all() as $error)

            <li>{{$error}}</li>

        @endforeach

    </ul>

</div>

@endif

@endsection

