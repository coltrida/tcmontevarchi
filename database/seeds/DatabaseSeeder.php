<?php

use App\Models\Socio;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Socio::truncate();
        User::truncate();

        Socio::create([
            'nome' => 'cacao',
            'cognome' => 'pippo',
            'anno' => 2000,
            'status' => 0
        ]);

        Socio::create([
            'nome' => 'cacao2',
            'cognome' => 'pippo2',
            'anno' => 2000,
            'status' => 1
        ]);

        Socio::create([
            'nome' => 'cacao3',
            'cognome' => 'pippo3',
            'anno' => 2000,
            'status' => 2
        ]);

        User::create([
            'nome' => 'cacao',
            'cognome' => 'pippo',
            'username' => 'cacao',
            'credito' => 0,
            'telefono' => 123456,
            'amici' => 1,
            'privilegi' => 0,
            'certificato' => '2020/01/01',
            'email' => 'cacao@cacao.it',
            'password' => '12345678',
            'anno' => 2000
        ]);
    }
}
