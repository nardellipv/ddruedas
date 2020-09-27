<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionSeeder::class);
        $this->call(ProvinceSeeder::class);
        //comentar
        $this->call(UserSeeder::class);
        $this->call(DealerSeeder::class);
        //---------
        $this->call(EquipmentSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(PatternSeeder::class);
        //comentar
        $this->call(ItemSeeder::class);
        $this->call(PictureSeeder::class);
        $this->call(EquipmentItemSeeder::class);
        $this->call(ItemPaymentSeeder::class);
        $this->call(BlogSeeder::class);
        //---------
        $this->call(CategorySeeder::class);
        //comentar
        $this->call(AccessorySeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(NewsLeeterSeeder::class);
        //---------
    }
}
