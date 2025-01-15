<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Импортируем класс Validator
use Illuminate\Support\Facades\Storage;  // Импортируем класс Storage

class FormController extends Controller
{
    public function showForm($filename = null)
    {
        $data = null;
        if ($filename) {
            // Получаем содержимое файла, если передан filename
            $content = Storage::disk('local')->get("users/{$filename}");
            $data = json_decode($content, true);
        }
        return view('form', ['data' => $data, 'filename' => $filename]);
    }

    public function submitForm(Request $request)
    {
        // Валидация
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:10|max:255',
            'mail' => 'required|string|min:10|max:255',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('form.show')
                ->withErrors($validator)
                ->withInput();
        }

        // Сохранение данных в файл
        $data = [
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'email' => $request->input('email'),
            'created_at' => now(),
        ];

        $filename = 'data_' . uniqid() . '.json';
        Storage::disk('local')->put("users/{$filename}", json_encode($data));

        return redirect()->route('form.show')->with('success', 'Данные успешно сохранены!');
    }

    public function showData()
    {
        $files = Storage::disk('local')->files('users');
        $data = [];

        foreach ($files as $file) {
            $content = Storage::disk('local')->get($file);
            $data[] = json_decode($content, true);
        }

        return view('data', ['data' => $data]);
    }
}
