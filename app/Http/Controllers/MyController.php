<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function formsend()
    {
        return view('form'); // Возвращаем представление about
    }
    public function about()
    {
        return view('about');
    }

    public function handleSubmit(Request $request)
    {
        // Обработка данных из формы
        $data = $request->all();
        return response()->json(['received' => $data]);
    }
}

