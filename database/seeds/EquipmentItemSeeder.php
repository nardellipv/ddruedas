<?php

use Illuminate\Database\Seeder;

class EquipmentItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\EquipmentItem::class, 120)->create();
    }
}
