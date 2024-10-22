<?php

use App\Jobs\FetchOffers;
use App\Jobs\Prices\FetchPricesForRema1000;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schedule;


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
    $valueSlug = Str::slug($value);
    Schedule::job(new FetchOffers($value))->daily()->at('02:00')->timezone('Europe/Copenhagen')->name('fetch-offers.' . $valueSlug);
}

// fetch rema1000 prices weekly
Schedule::job(new FetchPricesForRema1000())->weeklyOn(1, '02:00')->timezone('Europe/Copenhagen')->name('fetch-prices.rema1000');
