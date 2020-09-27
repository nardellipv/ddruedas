<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();

        $brands = [
            ['id'=>1,'name'=>'Agrale'],
            ['id'=>2,'name'=>'AJS'],
            ['id'=>3,'name'=>'Appia'],
            ['id'=>4,'name'=>'Aprilia'],
            ['id'=>5,'name'=>'Bajaj'],
            ['id'=>6,'name'=>'Benelli'],
            ['id'=>7,'name'=>'Beta'],
            ['id'=>8,'name'=>'BGH'],
            ['id'=>9,'name'=>'BMW'],
            ['id'=>10,'name'=>'Brava'],
            ['id'=>11,'name'=>'Cagiva'],
            ['id'=>12,'name'=>'Cerro'],
            ['id'=>13,'name'=>'Corven'],
            ['id'=>14,'name'=>'Cronos'],
            ['id'=>15,'name'=>'Daelim'],
            ['id'=>16,'name'=>'Dayang'],
            ['id'=>17,'name'=>'DKW'],
            ['id'=>18,'name'=>'Ducati'],
            ['id'=>19,'name'=>'Euromont'],
            ['id'=>20,'name'=>'Famsa'],
            ['id'=>21,'name'=>'Flaminia'],
            ['id'=>22,'name'=>'Garelli'],
            ['id'=>23,'name'=>'Gas Gas '],
            ['id'=>24,'name'=>'Gilera'],
            ['id'=>25,'name'=>'Gerrero'],
            ['id'=>26,'name'=>'Guzzi'],
            ['id'=>27,'name'=>'Harley Davidson'],
            ['id'=>28,'name'=>'Honda'],
            ['id'=>29,'name'=>'Husaberg'],
            ['id'=>30,'name'=>'Husqvarna'],
            ['id'=>31,'name'=>'IMSA'],
            ['id'=>32,'name'=>'ISO'],
            ['id'=>33,'name'=>'Jawa'],
            ['id'=>34,'name'=>'Jianshe'],
            ['id'=>35,'name'=>'Jincheng'],
            ['id'=>36,'name'=>'Jupiter'],
            ['id'=>37,'name'=>'Kasia'],
            ['id'=>38,'name'=>'Kawasaki'],
            ['id'=>39,'name'=>'Keeway'],
            ['id'=>40,'name'=>'Keller'],
            ['id'=>41,'name'=>'Kikai'],
            ['id'=>42,'name'=>'Konisa'],
            ['id'=>43,'name'=>'KTM'],
            ['id'=>44,'name'=>'Kumoto'],
            ['id'=>45,'name'=>'Kymco'],
            ['id'=>46,'name'=>'Lambretta'],
            ['id'=>47,'name'=>'Legnano'],
            ['id'=>48,'name'=>'Lucky Lion'],
            ['id'=>49,'name'=>'Matchless'],
            ['id'=>50,'name'=>'Maverick'],
            ['id'=>51,'name'=>'Mondial'],
            ['id'=>52,'name'=>'Motomel'],
            ['id'=>53,'name'=>'Okinoi'],
            ['id'=>54,'name'=>'Parilla'],
            ['id'=>55,'name'=>'Peugeot'],
            ['id'=>56,'name'=>'Phantom'],
            ['id'=>57,'name'=>'Piaggio'],
            ['id'=>58,'name'=>'Puma'],
            ['id'=>59,'name'=>'Royal Enfield'],
            ['id'=>60,'name'=>'Sherco'],
            ['id'=>61,'name'=>'Siambretta'],
            ['id'=>62,'name'=>'Speed Limit'],
            ['id'=>63,'name'=>'Sumo'],
            ['id'=>64,'name'=>'Sunra'],
            ['id'=>65,'name'=>'Suzuki'],
            ['id'=>66,'name'=>'SWM'],
            ['id'=>67,'name'=>'Sym'],
            ['id'=>68,'name'=>'Tehuelche'],
            ['id'=>69,'name'=>'Tibo'],
            ['id'=>70,'name'=>'Triumph'],
            ['id'=>71,'name'=>'Xioma'],
            ['id'=>72,'name'=>'X-Screams'],
            ['id'=>73,'name'=>'Yamaha'],
            ['id'=>74,'name'=>'Zanella']
        ];

        foreach ($brands as $brand) {
            \App\Brand::create($brand);
        }
    }
}
