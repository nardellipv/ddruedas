@extends('layouts.main')

@section('body', 'wp-automobile')

@section('content')
    @include('web.parts._introText')
    @include('web.parts._browseMoto')
    {{--@include('web.parts._function')--}}
    @include('web.parts._lastBlog')
@endsection
