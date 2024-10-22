<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function fetchPrices()
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

        return 'done';
    }
}
