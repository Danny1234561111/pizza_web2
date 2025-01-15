@extends('layouts.app')

@section('title', 'Форма')

@section('content')
    <h1 style="text-align: center;">{{ isset($data) ? 'Редактировать Данные' : 'Создать Данные' }}</h1>
    <h1>хах</h1>
    <div style="max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
        <form method="POST" action="{{ isset($data) ? route('form.update', $filename) : route('form.submit') }}">
        @csrf
        @if(isset($data))
            @method('PUT') <!-- Указываем метод PUT для обновления -->
            @endif

            <div style="text-align: left;">
                <div style="margin-bottom: 15px;">
                    <label for="name" style="font-weight: bold;">Имя:</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $data['name'] ?? '') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                @error('name')
                <div style="color: red;">{{ $message }}</div>
                @enderror

                <div style="margin-bottom: 15px;">
                    <label for="mail" style="font-weight: bold;">Пост:</label>
                    <textarea name="mail" id="mail" rows="5" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">{{ old('mail', $data['mail'] ?? '') }}</textarea>
                </div>
                @error('mail')
                <div style="color: red;">{{ $message }}</div>
                @enderror

                <div style="margin-bottom: 15px;">
                    <label for="email" style="font-weight: bold;">Почта:</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $data['email'] ?? '') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                @error('email')
                <div style="color: red;">{{ $message }}</div>
                @enderror

                <button type="submit" style="padding: 10px 15px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">{{ isset($data) ? 'Сохранить' : 'Создать' }}</button>
            </div>
        </form>
    </div>
@endsection
