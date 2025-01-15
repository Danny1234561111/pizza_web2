@extends('layouts.app')
@section('title', 'Блог')
@section('content')

    <h1>Блог</h1>
    <a href="{{ route('product.create') }}" style="text-decoration: none;">
        <button type="button" class="blog-button blog-button-info mb-3">Новый пост</button>
    </a>
    <div class="blog-container">
        @if ($products->isEmpty())
            <p>Нет постов для отображения.</p>
        @else
            @foreach($products as $product)
                <div class="blog-card">
                    <div class="blog-card-title">{{ $product->name }}</div>
                    <div class="blog-card-text">{{ $product->mail }}</div>

                    <div class="blog-comments">
                        <h4>Комментарии:</h4>
                        @if (optional($product->comments)->isEmpty())
                            <p>Нет комментариев</p>
                        @else
                            <ul class="comment-list">
                                @foreach($product->comments as $comment)
                                    <li class="comment-item" data-comment-id="{{ $comment->id }}">
                                        <span class="comment-text">{{ $comment->text }}</span>
                                        <div class="comment-actions">
                                            {{-- Удаление --}}
                                            <form action="{{ route('product.comments.destroy', ['product' => $product->id, 'comment' => $comment->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этот комментарий?');" class="blog-button blog-button-danger">Удалить</button>
                                            </form>
                                            {{-- Редактирование --}}
                                            <a href="{{ route('product.comments.edit', ['product' => $product->id, 'comment' => $comment->id])}}" class="blog-button blog-button-warning">Редактировать</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="blog-comment-form">
                        <form action="{{ route('product.comments.store', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            <textarea name="text" placeholder="Введите комментарий" class="comment-textarea {{ $errors->has('text') ? 'invalid-input' : '' }}" required minlength="5"></textarea>
                            @if ($errors->has('text'))
                                <span class="error-message">Комментарий слишком короткий</span>
                            @endif
                            <button type="submit" class="blog-button blog-button-primary">Добавить комментарий</button>
                        </form>
                    </div>
                    <div class="blog-button-container">
                        <a href="{{ route('product.show', $product->id) }}" class="blog-button blog-button-info">Подробнее</a>
                        <a href="{{ route('product.edit', $product->id) }}" class="blog-button blog-button-warning">Редактировать</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этот пост?');" class="blog-button blog-button-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
