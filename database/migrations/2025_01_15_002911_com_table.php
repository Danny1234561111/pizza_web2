<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Первичный ключ
            $table->unsignedBigInteger('products_id'); // Внешний ключ на таблицу products
            $table->text('text'); // Текст комментария
            $table->timestamps(); // created_at и updated_at

            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade'); // Внешний ключ
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
