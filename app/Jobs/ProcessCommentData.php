<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Products;
use Illuminate\Support\Facades\Log;

class ProcessCommentData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        Log::info('Starting job for: ' . json_encode($this->item));
        try {
            $product = Products::create([
                'name' => $this->item['name'],
                'mail' => $this->item['value'],
                'email' => $this->item['email'] ?? null,
                'time' => now(),
                'is_published' => true,
            ]);
            Log::info("Created product: " . json_encode($product->toArray()));
        } catch (\Exception $e) {
            Log::error("Error creating product: " . $e->getMessage());
            Log::error("Item causing the error: ". json_encode($this->item));
        }
    }
}
