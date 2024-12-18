<!-- resources/views/data.blade.php -->
@extends('layouts.app')

@section('title', 'Данные')

@section('content')
    <h1>Полученные данные</h1>

    @if (count($data) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Адрес Доставки</th>
                <th>Email</th>
                <th>Дата создания</th>
            </tr>
            </thead>
            <tbody>
                @if (!empty($data))
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item['name'] ?? 'Не указано' }}</td>
                            <td>{{ $item['mail'] ?? 'Не указано' }}</td>
                            <td>{{ $item['email'] ?? 'Не указано' }}</td>
                            <td>{{ $item['created_at'] ?? 'Не указано' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="1">Нет данных для отображения.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    @else
        <p>Нет данных для отображения.</p>
    @endif
@endsection
