<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;


class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'name' => 'クレジットカード',
        ]);
        PaymentMethod::create([
            'name' => '後払い',
        ]);
        PaymentMethod::create([
            'name' => 'd払い',
        ]);
        PaymentMethod::create([
            'name' => '楽天ペイ',
        ]);
    }
}
