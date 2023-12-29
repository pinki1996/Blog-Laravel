@extends('Layouts.app')


@section('content')
<h1>contact Page</h1>

@if (count($people))
    <ul>

        @foreach($people as $person)

            <li>{{$person}}</li>

         @endforeach
    </ul>

@endif

@stop

@section('footer')

<!-- <script>alert('Hello')</script> -->

@stop