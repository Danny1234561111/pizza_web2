@extends('layouts.app')
@section('content')
    <h1>Добавить комментарий</h1>
    <form action="{{ route('product.comments.store', ['product' => $product->id]) }}" method="POST">
        @csrf
        <textarea name="text" placeholder="Введите комментарий" required></textarea>
        <button type="submit" class="blog-button blog-button-primary">Добавить комментарий</button>
    </form>
    <a href="{{route('blog')}}">Назад</a>

@endsection
