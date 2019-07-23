<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;
use Faker\Factory as Faker;


class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('empresas')->delete();

        $faker = Faker::create();
        foreach (range(1, 50) as $i)
        {
            Empresa::create([
                'uf' => 'SC',
                'nome' => $faker->name(),
                'cnpj' => mt_rand(1, 100000000000000),
            ]);        }
       
    }
}
