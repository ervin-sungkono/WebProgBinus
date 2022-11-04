@extends('welcome')

@section('title', 'Home')

@section('heading','Welcome to Home Page')

@section('content')
    <p>Hello, Ervin Cahyadinata Sungkono.</p>
    <form action="/test" method="POST" class="form">
        @csrf
        <p>Please input two random numbers and submit</p>
        <div class="input-field">
            <label for="a">First Number: </label>
            <input type="number" name="a" id="a">
        </div>
        <div class="input-field">
            <label for="b">Second Number: </label>
            <input type="number" name="b" id="b">
        </div>
        <button type="submit">Submit Form</button>
    </form>
@endsection
