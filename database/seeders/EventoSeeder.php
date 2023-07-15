<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    private $faker;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $evento = new Evento();
        $evento->nombre = "";
        $evento->descripcion = "";
        $evento->lugarEvento = "";
        $evento->fechaInicioEvento = "";
        $evento->fechaFinEvento = "";
        $evento->horaEvento = "";
        $evento->lugarEntregaKits = "";
        $evento->fechaInicioEntregaKits = "";
        $evento->fechaFinEntregaKits = "";
        $evento->horaInicioEntregaKits = "";
        $evento->horaFinEntregaKits = "";
        $evento->imagen = $this->faker->image(null, 640, 480);
        */

        $evento1 = new Evento();
        $evento1->nombre = "ULTRA TRAIL DEL VENADO";
        $evento1->descripcion = "Una de las mejores carreras en el estado de Veracruz. VENADO R • T • H, en colaboración con PACER TIME, invitan a todos los corredores, clubes y equipos deportivos, así como también al público en general, a participar en la 3ra. Edición del ULTRA TRAIL DEL VENADO UTV, que se realizará en la ciudad de Misantla, Ver.";
        $evento1->lugarEvento = "Misantla, Ver";
        $evento1->fechaInicioEvento = "14/07/2023";
        $evento1->fechaFinEvento = "16/07/2023";
        $evento1->horaEvento = "07:00 AM";
        $evento1->lugarEntregaKits = "Parque José María Morelos y Pavón, Centro, Misantla, Ver";
        $evento1->fechaInicioEntregaKits = "14/07/2023";
        $evento1->fechaFinEntregaKits = "";
        $evento1->horaInicioEntregaKits = "02:00 PM";
        $evento1->horaFinEntregaKits = "08:00 PM";
        $evento1->imagen = "evento-ultra-tail-del-venado";
        $evento1->slug = "ultra-tail-del-venado";
        $evento1->save();

        $evento2 = new Evento();
        $evento2->nombre = "BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING";
        $evento2->descripcion = "Se hace una cordial invitación a todos los corredores, clubes, equipos y público en general a participar en la Segunda Edición del BACKYARD ULTRA HUATUSCO G NIGHT TRAIL a realizarse en la ciudad de Huatusco, ubicado en la Región de las Altas Montañas en el estado de Veracruz.";
        $evento2->lugarEvento = "Parque Colonia Pastoría El Cuatro, frente al restaurante La Herradura. Huatusco,Veracruz.";
        $evento2->fechaInicioEvento = "08/07/2023";
        $evento2->fechaFinEvento = "09/07/2023";
        $evento2->horaEvento = "06:00 AM";
        $evento2->lugarEntregaKits = "Parque Colonia Pastoría El Cuatro, frente al restaurante La Herradura.";
        $evento2->fechaInicioEntregaKits = "08/07/2023";
        $evento2->fechaFinEntregaKits = "";
        $evento2->horaInicioEntregaKits = "12:00 PM";
        $evento2->horaFinEntregaKits = "";
        $evento2->imagen = "evento-backvard-ultra-huatusco-night-trail-running";
        $evento2->slug = "backvard-ultra-huatusco-night-trail-running";
        $evento2->save();

        $evento3 = new Evento();
        $evento3->nombre = "5TA EDICIÓN CABADA LA PUERTA DE LOS TUXTLAS";
        $evento3->descripcion = "EL H. ayuntamiento de Ángel R. Cabada y el club ciclista Hacones de Lerdo invitan";
        $evento3->lugarEvento = "Ángel R. Cabada, Ver";
        $evento3->fechaInicioEvento = "30/07/2023";
        $evento3->fechaFinEvento = "";
        $evento3->horaEvento = "07:00 AM";
        $evento3->lugarEntregaKits = "H. ayuntamiento de Ángel R. Cabada";
        $evento3->fechaInicioEntregaKits = "29/08/2023";
        $evento3->fechaFinEntregaKits = "";
        $evento3->horaInicioEntregaKits = "02:30 PM";
        $evento3->horaFinEntregaKits = "09:30 PM";
        $evento3->imagen = "evento-5ta-edición-cabada-la-puerta-de-los-tuxtlas";
        $evento3->slug = "5ta-edición-cabada-la-puerta-de-los-tuxtlas";
        $evento3->save();




    }
}
