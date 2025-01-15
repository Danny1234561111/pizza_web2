<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
        $products = Products::with('comments')
            ->select('id', 'name', 'mail', 'email', 'time', 'is_published')
            ->where('is_published', true)
            ->orderBy('id', 'desc')
            ->get();

        // Проверка, является ли $products null, и возвращение пустого массива, если это так
        $products = $products ?? [];


        return view('product.index', compact('products'));
    }


    public function show(Products $product)
    {
        return view('product.show', compact('product'));
    }

    public function create()
    {
        return view('product.create', [
            'is_published' => true,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:10|max:255',
            'mail' => 'required|string|min:10|max:255',
            'email' => 'required|email|max:255',
        ], [
            'name.required' => 'Нужно ввести нормальное имя',
            'name.min' => 'А побольше name нельзя?',
            'mail.min' => 'А побольше mail нельзя?',
        ]);
        $product = Products::create(array_merge($request->all(), ['is_published' => true]));
        return redirect()->route('product.show', $product->id);
    }

    public function edit(Products $product)
    {
        return view('product.edit', compact('product'));
    }


    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Продукт успешно удален.');
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|string|min:10|max:255',
            'mail' => 'required|string|min:10|max:255',
            'email' => 'required|email|max:255',
        ]);

        $product->update($request->all());

        return redirect()->route('product.show', $product->id)->with('success', 'Продукт успешно обновлен.');
    }
}
