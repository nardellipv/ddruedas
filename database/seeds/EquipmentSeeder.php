<?php

use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment')->delete();

        $equipments = [
            ['id'=>1,'name'=>'Frenos a Disco'],
            ['id'=>2,'name'=>'Encendido Electronico'],
            ['id'=>3,'name'=>'Alarma'],
            ['id'=>4,'name'=>'ABS'],
            ['id'=>5,'name'=>'CBS'],
            ['id'=>6,'name'=>'Inyeccion Eléctronica'],
            ['id'=>7,'name'=>'Central de Información'],
            ['id'=>8,'name'=>'Caja Automática'],
            ['id'=>9,'name'=>'Embrague Automático'],
            ['id'=>10,'name'=>'Tablero Digital'],
            ['id'=>11,'name'=>'Llantas de Aleación']
        ];

        foreach ($equipments as $equipment) {
            \App\Equipment::create($equipment);
        }
    }
}
