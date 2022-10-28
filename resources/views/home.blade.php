@extends('welcome')

@section('title', 'Home')

@section('heading','Welcome to Home Page')

@section('content')
    <p>Hello, Ervin Cahyadinata Sungkono.</p>
    <form action="/test" method="POST">
        @csrf
        <p>Input two random numbers and submit</p>
        <input type="number" name="a" id="a">
        <input type="number" name="b" id="b">
        <button type="submit">Submit Form</button>
    </form>
@endsection
