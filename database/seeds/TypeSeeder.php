<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();

        $types = [
            ['id'=>1,'name'=>'Deportivas'],
            ['id'=>2,'name'=>'Calle/Naked'],
            ['id'=>3,'name'=>'Cubs/Utilitarias'],
            ['id'=>4,'name'=>'Scooter/Ciclomotor'],
            ['id'=>5,'name'=>'Turismo (Touring y Trail)'],
            ['id'=>6,'name'=>'Chopper/Custom'],
            ['id'=>7,'name'=>'Cross/Enduro'],
            ['id'=>8,'name'=>'Triciclos'],
            ['id'=>9,'name'=>'Otras']
        ];

        foreach ($types as $type) {
            \App\Type::create($type);
        }
    }
}
