<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Jobs\FetchOffers;
use App\Models\Offer;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }

    public function fetchOffers()
    {

        $stapleGoods  = [
            'mel',
            'pepsi max',
            'rødløg',
            'bananer',
            'vådservietter'
        ];


        foreach ($stapleGoods as $key => $value) {

            FetchOffers::dispatch($value);
        }




        // $requestUrl = 'https://etilbudsavis.dk/api/squid/v2/offers/search?query=' . $query . '&r_lat=55.695497&r_lng=12.550145&r_radius=20000&r_locale=da_DK&limit=50&offset=0';

        // #dd($requestUrl);
        // $response = Http::get($requestUrl);

        // $data = $response->json();

        // #dd($data[0]);


        // foreach ($data as $offer) {

        //     Offer::create([
        //         'api_offer_id' => $offer['id'],
        //         'offer_heading' => $offer['heading'],
        //         'offer_description' => $offer['description'],
        //         'price' => $offer['pricing']['price'],
        //         'quantity_unit' => $offer['quantity']['unit'],
        //         'quantity_size' => $offer['quantity']['size'],
        //         'quantity_pieces' => $offer['quantity']['pieces'],
        //         'store' => $offer['dealer']['name'],
        //         'run_from' => Carbon::parse($offer['run_from'], 'UTC')->toDateTimeString(),
        //         'run_till' => Carbon::parse($offer['run_till'], 'UTC')->toDateTimeString(),
        //         'publish' => Carbon::parse($offer['publish'], 'UTC')->toDateTimeString(),
        //         'api_store_id' => $offer['dealer']['id'],
        //         'store_id' => null,
        //     ]);
        // }

        // return 'done';
    }
}
