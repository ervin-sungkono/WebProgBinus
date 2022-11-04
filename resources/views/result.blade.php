@extends('welcome')

@section('title','Result')

@section('heading','Result of a and b comparing')

@section('content')
    @if ($a > $b)
        <?php $message = 'is more than'?>
    @elseif ($a < $b)
        <?php $message = 'is less than' ?>
    @else
        <?php $message = 'is equal to'?>
    @endif
    @include('components.alert', array('message'=>"$a $message $b"))
@endsection
