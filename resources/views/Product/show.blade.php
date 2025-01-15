

@extends('layouts.app')

@section('title', 'Форма')

@section('content')
    <a href="{{ route('product.index') }}">Back</a>

    <h1>{{ $product->name }}</h1>
    @if($product->mail)
        <p>Mail: {{ $product->mail }}</p>
    @endif
    @if($product->email)
        <p>Email: {{ $product->email }}</p>
    @endif
    @if($product->time)
        <p>Time: {{ $product->time }}</p>
    @endif
    <a href="{{ route('product.edit', $product->id) }}">Edit</a>
@endsection



