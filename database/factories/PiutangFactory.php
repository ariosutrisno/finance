<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
// use App\Model;
use App\Dashboard\HutangPiutang\Piutang;

$factory->define(Piutang::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'idx_kategori' => 2,
        'piutang_tanggal' => date('2020-10-22'),
        'piutang_jatuh' => date('2021-01-10'),
        'piutang_client' => $faker->firstName('male'),
        'piutang_deskripsi' => 'test',
        'piutang_nominal' => $faker->numberBetween(200000, 400000),
    ];
});
