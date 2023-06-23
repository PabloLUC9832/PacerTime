<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\EventoSeeder;
use Database\Seeders\SubEventoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventoTest extends TestCase
{

    //use RefreshDatabase;

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

    public function test_evento_create()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/eventos/create');
        $response->assertStatus(200);
        $response->assertViewIs('evento.create');
    }

    /**
     * Función para probar el correcto funcionamiento del método store, usado
     * en el EventoController, función Store, proveniente del formulario evento.create
     *
     * @view https://laravel.com/docs/10.x/http-tests
     * @see app/Http/Controllers/EventoController
     * @return void
     */
    public function test_evento_store()
    {
        $user = User::factory()->create();
        $this->seed(EventoSeeder::class);
        $this->seed(SubEventoSeeder::class);

        $this->withoutExceptionHandling();

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->postJson('/eventos/',[
                            //evento
                            'nombre' => 'ULTRA TRAIL DEL VENADO 2',
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

        $response->assertStatus(302);
        //$response->assertOk();
        $response->assertRedirect('eventos');

        /*Nos aseguramos que el registro haya sido guardado*/
        $this->assertDatabaseHas('eventos',[

            'nombre' => 'ULTRA TRAIL DEL VENADO 2',

        ]);

        $this->assertDatabaseHas('sub_eventos',[

            'categoria' => 'LIBRE',
            'distancia' => '5 Kilometros',

        ]);


    }

    public function test_evento_destroy()
    {

        $user = User::factory()->create();
        //$this->seed(EventoSeeder::class);
        //$this->seed(SubEventoSeeder::class);


        $response = $this->withoutExceptionHandling()
                         ->actingAs($user)
                         ->withSession(['banned' => false])
                         ->json('delete','/eventos/destroy/1')
                         ;
        $response->assertStatus(302);
        $response->assertRedirect('eventos');

        //$response->assertViewHas('some_var');


        $this->assertDatabaseMissing('eventos', [
            'id' => '1',
            //'nombre' => 'BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING',
        ]);

    }




}
