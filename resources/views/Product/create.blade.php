@extends('layouts.app')

@section('title', 'Форма')

@section('content')
    <a href="{{ route('product.index') }}">Back</a>
    <h1>Создать Новый Заказ</h1>
    <form method="POST" action="{{ route('product.store') }}">
        @csrf

        <label for="name">Name:
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </label>
        <br>
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="mail">Mail:
            <input type="text" name="mail" id="mail" value="{{ old('mail') }}">
        </label>
        <br>
        @error('mail')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="email">Email:
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </label>
        <br>
        @error('email')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="time">Time:
            <input type="datetime-local" name="time" id="time" value="{{ old('time') }}">
        </label>
        <br>
        @error('time')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Save</button>
    </form>
@endsection


