<?php

use App\Jobs\FetchOffers;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;



// fetch offers daily from etilbudsavis
Schedule::call(function () {

    // TODO: pull from userlist 
    $stapleGoods  = [
        'mel',
        'pepsi max',
        'rødløg',
        'bananer',
        'vådservietter',
        'yoghurt',
        'ost',
        'æg'
    ];

    foreach ($stapleGoods as $key => $value) {
        FetchOffers::dispatch($value);
    }
})->daily()->at('02:00')->name('fetch-offers');
