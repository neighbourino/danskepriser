<?php

use App\Jobs\FetchOffers;
use Illuminate\Support\Str;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
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
    Schedule::job(new FetchOffers($value))->daily()->at('12:15')->timezone('Europe/Copenhagen')->name('fetch-offers.' . $valueSlug);
}
