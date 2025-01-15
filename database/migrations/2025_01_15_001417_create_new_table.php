<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Первичный ключ (автоинкрементный ID)
            $table->string('name'); // Название продукта
            $table->string('mail'); // Поле mail
            $table->string('email'); // Email
            $table->boolean('is_published')->default(false); // Столбец is_published (по умолчанию false)
            $table->timestamp('time')->nullable(); // Временная метка time (может быть null)
            $table->timestamps(); // created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products'); // Удаляет таблицу products
    }
}
