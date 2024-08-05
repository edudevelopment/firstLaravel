<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
   
    public function run(): void
    {
        Cliente::create(
            [   
                'name' => 'Eduardo Elias',
                'email' => 'eduardo@email.com',
                'endereco' => 'rua lupionopolis',
                'nascimento' => '31-03-2004',
                'cep' => '01101010',
                'cpf' => '11111111100',
            ]    
        );

        Cliente::create(
            [   
                'name' => 'Rafaela Silva',
                'email' => 'rafs@email.com',
                'endereco' => 'rua blablabla',
                'nascimento' => '22-12-2004',
                'cep' => '22222',
                'cpf' => '3333133311',
            ]    
        );
    }
}
