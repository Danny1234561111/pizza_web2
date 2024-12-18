@extends('layouts.app')

@section('title', 'Меню пиццы')

@section('content')
    <h1>Меню пиццы</h1>

    <div class="pizza-menu">
        <div class="pizza-item">
            <h2>Маргарита</h2>
            <img src="{{ asset('images/margherita.jpg') }}" alt="Пицца Маргарита" class="pizza-image">
            <p>Классическая пицца с томатным соусом, моцареллой и свежим базиликом.</p>
            <span class="price">Цена: 500 руб.</span>
        </div>

        <div class="pizza-item">
            <h2>Пепперони</h2>
            <img src="{{ asset('images/pepperoni.jpg') }}" alt="Пицца Пепперони" class="pizza-image">
            <p>Пицца с томатным соусом, моцареллой и пикантной колбасой пепперони.</p>
            <span class="price">Цена: 600 руб.</span>
        </div>

        <div class="pizza-item">
            <h2>Четыре сыра</h2>
            <img src="{{ asset('images/four_cheeses.jpg') }}" alt="Пицца Четыре сыра" class="pizza-image">
            <p>Нежная пицца с моцареллой, горгонзолой, пармезаном и рикоттой.</p>
            <span class="price">Цена: 700 руб.</span>
        </div>

        <div class="pizza-item">
            <h2>Гавайская</h2>
            <img src="{{ asset('images/hawaiian.jpg') }}" alt="Пицца Гавайская" class="pizza-image">
            <p>Пицца с томатным соусом, моцареллой, ветчиной и ананасами.</p>
            <span class="price">Цена: 650 руб.</span>
        </div>
    </div>
@endsection
