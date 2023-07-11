<?php

namespace Tests\Feature;

use App\Models\Evento;
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
                            'minutoEvento' => '00',
                            'periodoEvento' => 'PM',

                            'lugarEntregaKits' => 'Misantla, Ver',
                            'fechaInicioEntregaKits' => '30/05/2023',
                            'fechaFinEntregaKits' => '',

                            'horaInicioEntregaKits' => '10',
                            'minutoInicioEntregaKits' => '00',
                            'periodoInicioEntregaKits' => 'AM',

                            'horaFinEntregaKits' => '',
                            'imagen' => 'evento-ultra trail del venado 2',

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

    public function test_evento_edit()
    {
        $user = User::factory()->create();
        $evento = Evento::find(2);
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get("eventos/edit/{$evento->id}");

        $response->assertStatus(200);
        $response->assertViewIs('evento.edit');

        //Se comprueba que se vea el nombre del evento
        $response->assertSee($evento->nombre);

    }

    public function test_evento_upate()
    {

        $user = User::factory()->create();
        $evento = Evento::find(2);

        foreach($evento->subEventos as $subEv){
            $cat[] = $subEv->categoria;
            $dis[] = $subEv->distancia;
            $ram[] = $subEv->rama;
            $pre[] = $subEv->precio;
            //$dist=explode(" ",$dis);
        }

        //dd($dis[0]);
        //die();
        /*
        $response = $this->actingAs($user)
                         ->withSession(['banned'=> false])
                         ->postJson('/eventos/update/2',[
                             'nombre' => $evento->nombre,
                             'descripcion' => $evento->descripcion,
                             'lugarEvento' => $evento->lugarEvento,
                             'fechaInicioEvento' => '09/07/2023',
                             'fechaFinEvento' => '11/07/2023',
                             'horaEvento' => '07',
                             'minutoEvento' => '00',
                             'periodoEvento' => 'AM',
                             'lugarEntregaKits' => $evento->lugarEntregaKits,
                             'fechaInicioEntregaKits' => '01/07/2023',
                             'fechaFinEntregaKits' => '05/07/2023',
                             'horaInicioEntregaKits' => '12',
                             'minutoInicioEntregaKits' => '30',
                             'periodoInicioEntregaKits' => 'PM',
                             'horaFinEntregaKits' => '05',
                             'minutoFinEntregaKits' => '55',
                             'periodoFinEntregaKits' => 'PM',

                             //subEvento
                             'categoria5' => 'ELITE VARONIL',
                             'distancia5' => '67',
                             'unidadDistancia5' => 'Kilometros',
                             'rama5' => 'VARONIL',
                             'precio5' => '500',

                             'categoria6' => 'ELITE FEMENIL',
                             'distancia6' => '67',
                             'unidadDistancia6' => 'Kilometros',
                             'rama6' => 'FEMENIL',
                             'precio6' => '500',

                             'categoria' => [],
                             'distancia' => [],
                             'unidadDistancia' => [],
                             'rama' => [],
                             'precio' => [],

                         ])
                         ;
        */
        $response = $this->withoutExceptionHandling()
            ->actingAs($user)
            ->withSession(['banned' => false])
            ->json('post','/eventos/update/2',[
                'nombre' => $evento->nombre,
                'descripcion' => $evento->descripcion,
                'lugarEvento' => $evento->lugarEvento,
                'fechaInicioEvento' => '09/07/2023',
                'fechaFinEvento' => '11/07/2023',
                'horaEvento' => '07',
                'minutoEvento' => '00',
                'periodoEvento' => 'AM',
                'lugarEntregaKits' => $evento->lugarEntregaKits,
                'fechaInicioEntregaKits' => '01/07/2023',
                'fechaFinEntregaKits' => '05/07/2023',
                'horaInicioEntregaKits' => '12',
                'minutoInicioEntregaKits' => '30',
                'periodoInicioEntregaKits' => 'PM',
                'horaFinEntregaKits' => '05',
                'minutoFinEntregaKits' => '55',
                'periodoFinEntregaKits' => 'PM',


                'categoria5' => 'ELITE VARONIL',
                'distancia5' => '67',
                'unidadDistancia5' => 'Kilometros',
                'rama5' => 'VARONIL',
                'precio5' => '500',

                'categoria6' => 'ELITE FEMENIL',
                'distancia6' => '67',
                'unidadDistancia6' => 'Kilometros',
                'rama6' => 'FEMENIL',
                'precio6' => '500',

                'categoria' => "xd",
                'distancia' => "12",
                'unidadDistancia' => "Kilometros",
                'rama' => "AMBAS",
                'precio' => "100",

            ])
        ;

        $response->assertStatus(200);
        $response->assertRedirect('eventos');

        /*Nos aseguramos que el registro haya sido guardado*/
        $this->assertDatabaseHas('eventos',[

            'id' => 2,
            'fechaInicioEvento' => '09/07/2023',
            'fechaFinEvento' => '11/07/2023',
            'horaEvento' => '07:00 AM',
            'fechaInicioEntregaKits' => '01/07/2023',
            'fechaFinEntregaKits' => '05/07/2023',
            'horaInicioEntregaKits' => '12:30 PM',
            'horaFinEntregaKits' => '05:55 PM',
        ]);


    }

    /**
     * Test para la visualización de sub eventos pertenecientes a un evento
     *
     */
    public function test_visualizar_categorias_pertenecientes_a_evento()
    {
        $user = User::factory()->create();
        $evento = Evento::find(2);

        //dd($evento->subEventos->id);
        //die();
        /*
        foreach($evento->subEventos as $subEv){
            $cat[] = $subEv->categoria;
            $dis[] = $subEv->distancia;
            $ram[] = $subEv->rama;
            $pre[] = $subEv->precio;
        }
        */

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get("subevento/delete/{$evento->id}");

        $response->assertStatus(200);
        $response->assertViewIs('subevento.delete');

        //Se comprueba que se vea el nombre del evento
        //$response->assertSee("BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING");
        //$response->assertSee($cat);
        foreach($evento->subEventos as $subEv){
            $response->assertSee($subEv->categoria);
            $response->assertSee($subEv->distancia);
            $response->assertSee($subEv->rama);
            $response->assertSee($subEv->precio);
        }
    }

    public function test_eliminar_categorias_pertenecientes_a_evento()
    {
        $user = User::factory()->create();
        $evento = Evento::find(2);
        foreach($evento->subEventos as $subEv){
            $ids[] = $subEv->id;
        }
        $subEvEliminar = array_rand($ids);
        $idRandom = $ids[$subEvEliminar];
        //dd($ids[$subEvEliminar]);
        //die();

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->json('delete',"/subevento/destroy/{$idRandom}")
                         ;

        $response->assertStatus(302);
        $response->assertSessionHas(['message' => 'La categoría, distancia, rama y precio han sido eliminadas exitosamente.',]);

        $this->assertDatabaseMissing('sub_eventos', [
            'id' => $idRandom,
        ]);

    }


    public function test_evento_destroy()
    {

        $user = User::factory()->create();
        $evento = Evento::find(2);

        $response = $this->withoutExceptionHandling()
                         ->actingAs($user)
                         ->withSession(['banned' => false])
                         ->json('delete',"/eventos/destroy/{$evento->id}")
                         ;
        $response->assertStatus(302);
        $response->assertRedirect('eventos');

        //$response->assertViewHas('some_var');
        $response->assertSessionHas(['message' => 'El evento ha sido eliminado exitosamente.',]);

        $this->assertDatabaseMissing('eventos', [
            'id' => $evento->id,
            //'nombre' => 'BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING',
        ]);

    }




}
