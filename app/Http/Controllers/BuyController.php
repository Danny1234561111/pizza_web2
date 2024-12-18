<?php

namespace App\Http\Controllers;

use App\Models\Product; // Убедитесь, что модель Product подключена
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index() {
        $products = Product::select('id', 'name', 'mail', 'email', 'time')->orderBy('id','desc')->get();
        return view('product.index', compact('products'));
    }

    public function show(Product $product) {
        return view('product.show', compact('product'));
    }

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:10|max:255',
            'mail' => 'required|string|min:10|max:255',
            'email' => 'required|email|max:255',
        ], [
            'name.required' => 'Нужно ввести нормальное имя',
            'name.min' => 'А побольше name нельзя?',
            'mail.min' => 'А побольше mail нельзя?',
        ]);

        $product = Product::create($request->all());

        return redirect()->route('product.show', $product->id);
    }

    public function edit(Product $product) {
        return view('product.edit', compact('product'));
    }
    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Продукт успешно удален.');
    }
}
