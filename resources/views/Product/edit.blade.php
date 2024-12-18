@extends('layouts.app')

@section('title', 'Форма')

@section('content')
    <a href="{{ route('product.index') }}">Back</a>
    <h1>Create New Product</h1>
    <form method="POST" action="{{ route('product.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <br>
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="mail">Mail:</label>
        <input type="text" name="mail" id="mail" value="{{ old('mail') }}">
        <br>
        @error('mail')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        <br>
        @error('email')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="time">Time:</label>
        <input type="datetime-local" name="time" id="time" value="{{ old('time') }}">
        <br>
        @error('time')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Save</button>
    </form>
@endsection@extends('layouts.app')

@section('title', 'Форма')

@section('content')
    <a href="{{ route('product.index') }}">Back</a>
    <h1>Create New Product</h1>
    <form method="POST" action="{{ route('product.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <br>
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="mail">Mail:</label>
        <input type="text" name="mail" id="mail" value="{{ old('mail') }}">
        <br>
        @error('mail')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        <br>
        @error('email')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="time">Time:</label>
        <input type="datetime-local" name="time" id="time" value="{{ old('time') }}">
        <br>
        @error('time')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Save</button>
    </form>
@endsection


