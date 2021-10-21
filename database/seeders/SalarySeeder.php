<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salary;
use DB;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i=2; $i < 10; $i++) {
            DB::table('expenses')->insert([


                'type_de_depense' => 'Carburant',
                'expense_at'          => '2020-'.$i.'-01',
                'expense_amount'       =>10000,
                'user_id' =>1,
                'created_at'          => '2020-'.$i.'-01',
                'description' => 'dfghjuilkujyhtgrfed'

            ]);
        }
    }
}
