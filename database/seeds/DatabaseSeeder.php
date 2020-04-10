<?php

use App\Models\Prenotazione;
use App\Models\Socio;
use App\User;
use Carbon\Carbon;
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

        $dataoggi = Carbon::now()->format('y-m-d');

        Socio::truncate();
        User::truncate();
        Prenotazione::truncate();

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

        Socio::create([
            'nome' => 'admin',
            'cognome' => 'admin',
            'anno' => 2000,
            'status' => 3
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

        User::create([
            'nome' => 'cacao2',
            'cognome' => 'pippo2',
            'username' => 'cacao2',
            'credito' => 0,
            'telefono' => 123456,
            'amici' => 1,
            'privilegi' => 0,
            'certificato' => '2020/01/01',
            'email' => 'cacao2@cacao.it',
            'password' => '12345678',
            'anno' => 2000
        ]);

        User::create([
            'nome' => 'admin',
            'cognome' => 'admin',
            'username' => 'admin',
            'credito' => 0,
            'telefono' => 123456,
            'amici' => 1,
            'privilegi' => 7,
            'certificato' => '2020/01/01',
            'email' => 'admin@admin.it',
            'password' => '12345678',
            'anno' => 2000
        ]);

        Prenotazione::create([
            'username1' => 'cacao',
            'campo' => 'campo1',
            'dataprenotazione' => $dataoggi,
            'doppio' => 0,
            'oraon' => 10
        ]);

        Prenotazione::create([
            'username1' => 'cacao',
            'username2' => 'cacao2',
            'campo' => 'campo2',
            'dataprenotazione' => $dataoggi,
            'doppio' => 0,
            'oraon' => 13
        ]);

        Prenotazione::create([
            'username1' => 'cacao',
            'username2' => 'cacao2',
            'campo' => 'campo2',
            'dataprenotazione' => $dataoggi,
            'doppio' => 0,
            'oraon' => 14
        ]);

        Prenotazione::create([
            'username1' => 'cacao',
            'username2' => 'cacao',
            'username3' => 'cacao',
            'campo' => 'campo3',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 10
        ]);

        Prenotazione::create([
            'username1' => 'cacao',
            'username2' => 'cacao',
            'username3' => 'cacao',
            'username4' => 'cacao',
            'campo' => 'campo4',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 10
        ]);
    }
}
