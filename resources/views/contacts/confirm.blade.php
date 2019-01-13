@extends('layouts.app')
@section('content')
<form action="{{ url('/contact/complete') }}" method="post">
    {{ csrf_field() }} 
    
    {{$contact->name}}
    {{$contact->email}}
    {{$contact->message}}
    <input type="submit" name="action" value="submit">
    <input type="submit" name="action" value="return">
    @foreach($contact->getAttributes() as $key => $value)
    <input type="hidden" name="{{$key}}" value="{{$value}}">
    @endforeach
</form>
@endsection