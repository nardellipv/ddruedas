<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->delete();

        $payments = [
            ['id'=>1,'name'=>'Efectivo a Convenir'],
            ['id'=>2,'name'=>'Permuto por Mayor'],
            ['id'=>3,'name'=>'Permuto por Menor'],
            ['id'=>4,'name'=>'Financio']
        ];

        foreach ($payments as $payment) {
            \App\Payment::create($payment);
        }
    }
}
