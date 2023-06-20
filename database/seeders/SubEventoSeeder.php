<?php

namespace Database\Seeders;

use App\Models\SubEvento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*
        $subEvento = new SubEvento();
        $subEvento->distancia = "";
        $subEvento->categoria = "";
        $subEvento->precio = ;
        $subEvento->rama = "";
        $subEvento->evento_id = $idEvento;
        */

        $maxIdEvento = 3;
        //$idEvento = rand(1, $maxIdEvento);

        $subEvento1 = new SubEvento();
        $subEvento1->distancia = "60 Kilometros";
        $subEvento1->categoria = "LIBRE";
        $subEvento1->precio = 1300;
        $subEvento1->rama = "AMBAS";
        $subEvento1->evento_id = rand(1, $maxIdEvento);
        $subEvento1->save();

        $subEvento2 = new SubEvento();
        $subEvento2->distancia = "35 Kilometros";
        $subEvento2->categoria = "MASTER";
        $subEvento2->precio = 900;
        $subEvento2->rama = "AMBAS";
        $subEvento2->evento_id = rand(1, $maxIdEvento);
        $subEvento2->save();

        $subEvento3 = new SubEvento();
        $subEvento3->distancia = "10 Kilometros";
        $subEvento3->categoria = "VETERANOS";
        $subEvento3->precio = 750;
        $subEvento3->rama = "AMBAS";
        $subEvento3->evento_id = rand(1, $maxIdEvento);
        $subEvento3->save();

        $subEvento4 = new SubEvento();
        $subEvento4->distancia = "05 Kilometros";
        $subEvento4->categoria = "LIBRE";
        $subEvento4->precio = 620;
        $subEvento4->rama = "AMBAS";
        $subEvento4->evento_id = rand(1, $maxIdEvento);
        $subEvento4->save();

        $subEvento5 = new SubEvento();
        $subEvento5->distancia = "67 Kilometros";
        $subEvento5->categoria = "ELITE VARONIL";
        $subEvento5->precio = 500;
        $subEvento5->rama = "VARONIL";
        $subEvento5->evento_id = rand(1, $maxIdEvento);
        $subEvento5->save();

        $subEvento6 = new SubEvento();
        $subEvento6->distancia = "67 Kilometros";
        $subEvento6->categoria = "MASTER 30";
        $subEvento6->precio = 500;
        $subEvento6->rama = "AMBAS";
        $subEvento6->evento_id = rand(1, $maxIdEvento);
        $subEvento6->save();

        $subEvento7 = new SubEvento();
        $subEvento7->distancia = "67 Kilometros";
        $subEvento7->categoria = "MASTER 40";
        $subEvento7->precio = 500;
        $subEvento7->rama = "AMBAS";
        $subEvento7->evento_id = rand(1, $maxIdEvento);
        $subEvento7->save();

        $subEvento8 = new SubEvento();
        $subEvento8->distancia = "67 Kilometros";
        $subEvento8->categoria = "ELITE FEMENIL";
        $subEvento8->precio = 500;
        $subEvento8->rama = "FEMENIL";
        $subEvento8->evento_id = rand(1, $maxIdEvento);;
        $subEvento8->save();

        $subEvento9 = new SubEvento();
        $subEvento9->distancia = "67 Kilometros";
        $subEvento9->categoria = "NOVATAS";
        $subEvento9->precio = 500;
        $subEvento9->rama = "FEMENIL";
        $subEvento9->evento_id = rand(1, $maxIdEvento);;
        $subEvento9->save();




    }
}
