<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuario')->insert([
            'nome' => Str::random(10), 
            'senha' => Hash::make('password'),
            'tipo' => $this->getTipos()
        ]);
    }

    public function getTipos(): string 
    {
        $tipos = ["RH", "GESTOR"];
        return $tipos[array_rand($tipos)]; 
    }

}
