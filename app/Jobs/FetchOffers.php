<?php

namespace App\Jobs;

use App\Models\Offer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class FetchOffers implements ShouldQueue
{
    use Queueable;

    public $query;

    /**
     * Create a new job instance.
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $this->fetchOffers($this->query);
    }


    private function fetchOffers($query = null)
    {
        if (!$query) {
            return false;
        }
        $requestUrl = 'https://etilbudsavis.dk/api/squid/v2/offers/search?query=' . $query . '&r_lat=55.695497&r_lng=12.550145&r_radius=20000&r_locale=da_DK&limit=50&offset=0';

        $response = Http::get($requestUrl);

        $data = $response->json();

        foreach ($data as $offer) {

            Offer::create([
                'api_offer_id' => $offer['id'],
                'offer_heading' => $offer['heading'],
                'offer_description' => $offer['description'],
                'price' => $offer['pricing']['price'],
                'quantity_unit' => $offer['quantity']['unit'],
                'quantity_size' => $offer['quantity']['size'],
                'quantity_pieces' => $offer['quantity']['pieces'],
                'store' => $offer['dealer']['name'],
                'run_from' => Carbon::parse($offer['run_from'], 'UTC')->toDateTimeString(),
                'run_till' => Carbon::parse($offer['run_till'], 'UTC')->toDateTimeString(),
                'publish' => Carbon::parse($offer['publish'], 'UTC')->toDateTimeString(),
                'api_store_id' => $offer['dealer']['id'],
                'store_id' => null,
                'query' => $query,
            ]);
        }

        return true;
    }
}
