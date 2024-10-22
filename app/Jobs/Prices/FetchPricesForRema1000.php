<?php

namespace App\Jobs\Prices;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class FetchPricesForRema1000 implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $requestUrl = 'https://cphapp.rema1000.dk/api/v1/catalog/store/1/withchildren';
        $response = Http::get($requestUrl);
        $data = $response->json();
        $store = 'Rema 1000';
        foreach ($data['departments'] as $key => $department) {

            foreach ($department['categories'] as $x => $category) {

                foreach ($category['items'] as $y => $item) {

                    Product::create([
                        'api_item_id' => $item['id'],
                        'name' => $item['name'],
                        'description' => $item['underline'],
                        'price' => $item['pricing']['price'],
                        'store' => $store,
                        'api_category' => $category['name']
                    ]);
                }
            }
        }
    }
}
