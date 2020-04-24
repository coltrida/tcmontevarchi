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

        $dataoggi = Carbon::now()->addHour(2)->format('y-m-d');

        Socio::truncate();
        User::truncate();
        Prenotazione::truncate();

        Socio::create([
            'nome' => 'Davide',
            'cognome' => 'Coltrioliiiii',
            'username' => 'cacao2',
            'anno' => 2000,
            'status' => 0
        ]);

        Socio::create([
            'nome' => 'Marco',
            'cognome' => 'Cataniaaaaaa',
            'username' => 'cacao',
            'anno' => 2000,
            'status' => 3
        ]);

        Socio::create([
            'nome' => 'cacao3',
            'cognome' => 'pippo3',
            'username' => 'cacao3',
            'anno' => 2000,
            'status' => 2
        ]);

        Socio::create([
            'nome' => 'admin',
            'cognome' => 'admin',
            'username' => 'admin',
            'anno' => 2000,
            'status' => 1
        ]);

        Socio::create([
            'nome' => 'Franco',
            'cognome' => 'Pippo',
            'anno' => 2000,
            'status' => 4
        ]);

        Socio::create([
            'nome' => 'Gino',
            'cognome' => 'Monorenne',
            'anno' => 2010,
            'status' => 0
        ]);

        Socio::create([
            'nome' => 'Pino',
            'cognome' => 'Over',
            'anno' => 1930,
            'status' => 0
        ]);

        User::create([
            'nome' => 'Davide',
            'cognome' => 'Coltrioliiiii',
            'username' => 'cacao2',
            'credito' => 100,
            'telefono' => 123456,
            'amici' => 1,
            'privilegi' => 0,
            'certificato' => '2020/01/01',
            'user_id' => 1055651158,
            'email' => 'cacao@cacao.it',
            'password' => '12345678',
            'anno' => 2000
        ]);

        User::create([
            'nome' => 'Marco',
            'cognome' => 'Cataniaaaaaa',
            'username' => 'cacao',
            'credito' => 100,
            'telefono' => 123456,
            'amici' => 1,
            'privilegi' => 7,
            'user_id' => 1190914722,
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

/*        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'campo' => 'campo1',
            'dataprenotazione' => $dataoggi,
            'doppio' => 0,
            'oraon' => 10
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Coltrioliiiii',
            'campo' => 'campo2',
            'dataprenotazione' => $dataoggi,
            'doppio' => 0,
            'oraon' => 13
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Coltrioliiiii',
            'campo' => 'campo2',
            'dataprenotazione' => $dataoggi,
            'doppio' => 0,
            'oraon' => 14
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username3' => 'Cataniaaaaaa',
            'campo' => 'campo3',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 10
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username3' => 'Coltrioliiiii',
            'username4' => 'Coltrioliiiii',
            'campo' => 'campo4',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 10
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'campo' => 'campo3',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 15
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username3' => 'Coltrioliiiii',
            'username4' => 'Coltrioliiiii',
            'campo' => 'campo1',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 11
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username3' => 'Coltrioliiiii',
            'username4' => 'Coltrioliiiii',
            'campo' => 'campo1',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 12
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username4' => 'Coltrioliiiii',
            'campo' => 'campo4',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 13
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username3' => 'Coltrioliiiii',
            'campo' => 'campo4',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 14
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username3' => 'Coltrioliiiii',
            'campo' => 'campo4',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 15
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'campo' => 'campo4',
            'dataprenotazione' => $dataoggi,
            'doppio' => 0,
            'oraon' => 16
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username3' => 'Coltrioliiiii',
            'campo' => 'campo4',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 17
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username2' => 'Cataniaaaaaa',
            'username3' => 'Coltrioliiiii',
            'campo' => 'campo3',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 18
        ]);

        Prenotazione::create([
            'username1' => 'Cataniaaaaaa',
            'username3' => 'Coltrioliiiii',
            'campo' => 'campo1',
            'dataprenotazione' => $dataoggi,
            'doppio' => 1,
            'oraon' => 14
        ]);*/
    }
}
