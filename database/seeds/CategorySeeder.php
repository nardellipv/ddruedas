<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            ['id' => 1, 'name' => 'Chasis', 'slug' => 'chasis'],
            ['id' => 2, 'name' => 'Encendido', 'slug' => 'encendido'],
            ['id' => 3, 'name' => 'Escapes y Silenciadores', 'slug' => 'escapes-y-silenciadores'],
            ['id' => 4, 'name' => 'Faros y Opticas', 'slug' => 'faros-y-opticas'],
            ['id' => 5, 'name' => 'Filtros', 'slug' => 'filtros'],
            ['id' => 6, 'name' => 'Motor', 'slug' => 'motor'],
            ['id' => 7, 'name' => 'Transmisión', 'slug' => 'transmision'],
            ['id' => 8, 'name' => 'Otros', 'slug' => 'otros'],
        ];

        foreach ($categories as $category) {
            \App\Category::create($category);
        }
    }
}
