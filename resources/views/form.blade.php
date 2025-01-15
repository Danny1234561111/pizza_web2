<!-- resources/views/form.blade.php -->
@extends('layouts.app')

@section('title', 'Форма')

@section('content')
    <h1>Отправить данные</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <div>
            <label for="name" class="form-label">Имя:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div>
            <label for="mail" class="form-label">Адрес доставки:</label>
            <input type="text" name="mail" id="mail" class="form-control" required>
        </div>
        <div>
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
