@extends('layouts.email')

@section('content')
    <div>
        <p>{{ $email }}</p>
        <p>{{ $phone }}</p>
        <p>{{ $text }}</p>
    </div>
@endsection