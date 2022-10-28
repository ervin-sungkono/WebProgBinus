@extends('welcome')

@section('title','Result')

@section('heading','Result of a and b comparing')

@section('content')
    @if ($a > $b)
        <?php $message = 'a is more than b' ?>
    @elseif ($a < $b)
        <?php $message = 'a is less than b' ?>
    @else
        <?php $message = 'a is equal to b'?>
    @endif
    @include('components.alert', array('message'=>$message))
@endsection
