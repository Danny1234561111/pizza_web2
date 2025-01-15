@extends('layouts.app')

@section('title', 'Форма')

@section('content')
    <a href="{{ route('product.index') }}" style="text-decoration: none; color: #007BFF;">Назад</a>

    <div style="max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
        <h1 style="font-size: 24px; color: #333;">{{ $product->name }}</h1>
        @if($product->mail)
            <p style="font-size: 16px; color: #555;">Текст: <span style="font-weight: bold;">{{ $product->mail }}</span></p>
        @endif
        @if($product->email)
            <p style="font-size: 16px; color: #555;">Почта: <span style="font-weight: bold;">{{ $product->email }}</span></p>
    @endif
    <!-- Кнопка редактирования, которая ведет на страницу редактирования -->
        <a href="{{ route('product.edit', $product->id) }}" style="text-decoration: none; color: #28a745; font-weight: bold;">Редактировать</a>
    </div>
@endsection
