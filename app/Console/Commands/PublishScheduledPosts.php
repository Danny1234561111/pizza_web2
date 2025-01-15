<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // Добавили для логирования

class PublishScheduledPosts extends Command
{
    protected $signature = 'posts:publish-scheduled {posts*}';
    protected $description = 'Publish posts sequentially with 5-second delays.';

    public function handle()
    {
        $posts = $this->argument('posts');

        if (!empty($posts)) {
            foreach ($posts as $i => $postData) {
                // Разбираем строку данных
                list($name, $mail, $email) = explode('|', $postData);

                $publishAt = Carbon::now()->addSeconds(50 * $i); // Задержка 50 секунд на каждый пост
                $product = Products::create([
                    'name' => $name,
                    'mail' => $mail,
                    'email' => $email,
                    'time' => $publishAt,
                    'is_published' => false,
                ]);


                // Ждем 5 секунд перед публикацией следующего поста
                sleep(50); // Задержка в 50 секунд

                $product->is_published = true;
                $product->save();

                $this->info("Post '{$name}' published at {$product->time}");
                Log::info("Post '{$name}' published at {$product->time}"); // Записываем в лог
            }
        }

        // Публикация запланированных постов (без задержек)
        $scheduledPosts = Products::where('time', '<=', Carbon::now())
            ->where('is_published', false)
            ->get();

        foreach ($scheduledPosts as $product) {
            $product->is_published = true;
            $product->save();
            $this->info("Scheduled post '{$product->name}' published.");
            Log::info("Scheduled post '{$product->name}' published."); // Записываем в лог
        }

        $this->info("Post publishing finished.");
        Log::info("Post publishing finished."); // Записываем в лог
        return 0;
    }
}
/*
php artisan posts:publish-scheduled "Post 1|Content 1|author1@example.com" "Post 2|Content 2|author2@example.com" "Post 3|Content 3|author3@example.com"
*/
