<?php

use Illuminate\Database\Seeder;

class ItemPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ItemPayment::class, 10)->create();
    }
}
