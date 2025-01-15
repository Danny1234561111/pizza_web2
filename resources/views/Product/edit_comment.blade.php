@extends('layouts.app')
@section('title', 'Редактировать комментарий')
@section('content')
<div class="container">
        <h1>Редактировать комментарий</h1>
        <form action="{{ route('product.comments.update', ['product' => $product->id, 'comment' => $comment->id]) }}" method="POST">
    @csrf
            @method('PUT')
            <div class="form-group">
                <label for="text">Текст комментария:</label>
                <textarea name="text" id="text" class="form-control {{ $errors->has('text') ? 'invalid-input' : '' }}" required minlength="5">{{ $comment->text }}</textarea>
@if ($errors->has('text'))
                    <span class="error-message">Комментарий слишком короткий</span>
@endif
            </div>
            <button type="submit" class="blog-button blog-button-primary">Сохранить</button>
            <a href="{{ route('product.index') }}" class="blog-button blog-button-secondary">Отмена</a>
        </form>
    </div>
    <style>
        .error-message {
    color: red;
    font-size: 0.8em;
            margin-top: 5px;
        }

        .invalid-input {
    border: 1px solid red;
        }
    </style>
@endsection
