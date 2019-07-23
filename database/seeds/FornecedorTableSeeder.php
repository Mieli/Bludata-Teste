<?php

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Faker\Factory as Faker;

class FornecedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fornecedores')->delete();

        $faker = Faker::create();
        foreach (range(1, 50) as $i)
        {
            Fornecedor::create([
                'empresa_id' => rand(1, 50),
                'nome'                 => $faker->name(),
                'cpf'                  => mt_rand(1, 100000000000),
                'cnpj'                 => mt_rand(1, 100000000000000),
                'rg'                   => mt_rand(1, 10000000000),
                'data_nascimento'      => $faker->dateTime($max = 'now'),
                'telefone_celular'     => $faker->tollFreePhoneNumber,
                'telefone_residencial' => $faker->tollFreePhoneNumber,
                'telefone_comercial'   => $faker->tollFreePhoneNumber,
            ]);       
        }
    }
}
