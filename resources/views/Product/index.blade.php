@extends('layouts.app')

@section('title', 'Форма')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('product.create') }}" style="text-decoration: none;">
        <button type="button">Новый заказ</button>
    </a>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px;">Продукт</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                </td>
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этот продукт?');" style="background-color: #f44336; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
