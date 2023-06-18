<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /**
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    */

    public function test_evento_index(): void
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/eventos');
        $response->assertStatus(200);
    }

    public function test_evento_store()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->postJson('/eventos/',[
                                    //evento
                                    'nombre' => 'ULTRA TRAIL DEL VENADO',
                                    'descripcion' => 'ULTRA TRAIL DEL VENADO UÑA DE LAS MEJORES CARRERAS EN ELES DE "NO CUENTES Log VÍAS HAZ Log VÍAS CUENTEN! ATRAPEMOS AL VENADO CONVOCATORIA INFORMACIÓN GENERAL VENADO R • T • H, en colaboración con PACER TIME, invitan a todos los corredores, clubes y equipos deportivos, así como también al público en general, a participar en la 3ra. Edición del ULTRA TRAIL DEL VENADO "UTV", que se realizará en la ciudad de Misantla, Ver.',

                                    'lugarEvento' => 'Misantla, Ver',
                                    'fechaInicioEvento' => '14/07/2023',
                                    'fechaFinEvento' => '17/07/2023',

                                    'horaEvento' => '02',
                                    'minutoEvento' => '45',
                                    'periodoEvento' => 'PM',

                                    'lugarEntregaKits' => 'Misantla, Ver',
                                    'fechaInicioEntregaKits' => '30/05/2023',
                                    'fechaFinEntregaKits' => '',

                                    'horaInicioEntregaKits' => '10',
                                    'minutoInicioEntregaKits' => '20',
                                    'periodoInicioEntregaKits' => 'AM',

                                    'horaFinEntregaKits' => '',

                                    //subEvento
                                    'categoria' => ['LIBRE','MASTER'],
                                    'distancia' => ['5','10'],
                                    'unidadDistancia' => ['Kilometros','Millas'],
                                    'rama' => ['AMBAS','VARONIL'],
                                    'precio' => ['500','1000'],

                                    ]);

        $response->assertOk();
        /*
        $this->assertDatabaseHas('eventos',[

            'nombre' => 'ULTRA TRAIL DEL VENADO',
            'descripcion' => 'ULTRA TRAIL DEL VENADO UÑA DE LAS MEJORES CARRERAS EN ELES DE "NO CUENTES Log VÍAS HAZ Log VÍAS CUENTEN! ATRAPEMOS AL VENADO CONVOCATORIA INFORMACIÓN GENERAL VENADO R • T • H, en colaboración con PACER TIME, invitan a todos los corredores, clubes y equipos deportivos, así como también al público en general, a participar en la 3ra. Edición del ULTRA TRAIL DEL VENADO "UTV", que se realizará en la ciudad de Misantla, Ver.',
            'lugarEvento' => 'Misantla, Ver',
            'fechaInicioEvento' => '14/07/2023',
            'fechaFinEvento' => '17/07/2023',
            'horaEvento' => '06:00 AM',
            'lugarEntregaKits' => 'Misantla, Ver',
            'fechaInicioEntregaKits' => '30/05/2023',
            'fechaFinEntregaKits' => '',
            'horaInicioEntregaKits' => '10:00 AM',
            'horaFinEntregaKits' => '',

        ]);
        */
    }




}
