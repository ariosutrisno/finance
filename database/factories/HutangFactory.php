<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
// use App\Model;
use App\Dashboard\HutangPiutang\Hutang;

$factory->define(Hutang::class, function (Faker $faker) {
    return [
        'user_id'=> 1,
        'idx_kategori'=>1,
        'hutang_tanggal'=>date('2020-10-22'),
        'hutang_jatuh'=> date('2021-01-10'),
        'hutang_client'=>$faker->firstName('male'),
        'hutang_deskripsi'=>'test',
        'hutang_nominal'=> $faker->numberBetween(200000,400000),
    ];
});
