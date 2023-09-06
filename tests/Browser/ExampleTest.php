<?php

namespace Tests\Browser;

use App\Models\Competidor;
use App\Models\Evento;
use App\Models\User;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function test_evento_competidor_index(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertRouteIs('competidor.index')
                    ->assertTitle("Inicio | Pacer Time")
                    ;
        });
    }

    public function test_evento_admin_index(): void
    {
        $user = User::find(1);
        $eventos = Evento::all();

        $this->browse(function (Browser $browser) use ($user,$eventos) {
            $browser->loginAs($user)
                    ->visit('/eventos')
                    ->assertRouteIs('eventos.index')
                    ->assertTitle("Inicio | Pacer Time")
                    ->assertSee($user->name);

            $elements = $browser->driver->findElements(WebDriverBy::id('card'));
            $this->assertCount(count($eventos), $elements);
            $browser->screenshot('test_evento_admin_index');
        });
    }

    public function test_evento_admin_create(): void
    {
        $user = User::find(1);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->press("Eventos")
                ->clickLink('Añadir evento')
                ->assertRouteIs('eventos.create')
                ->assertTitle("Crear evento")
                ->screenshot('test_evento_admin_create')
                ;
        });
    }

    public function test_evento_admin_store()
    {
        $user = User::find(1);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/eventos/create')
                ->resize(1920, 3000)
                ->assertTitle("Crear evento")
                ->type('nombre','Evento from Dusk')
                ->type('descripcion','lorem lorem lorem lorem')
                ->type('lugarEvento','Duks')
                ->type('fechaInicioEvento','31/08/2023')
                ->type('fechaFinEvento','02/09/2023')
                ->select('horaEvento')
                ->select('minutoEvento')
                ->select('periodoEvento')
                ->attach('files[]', __DIR__.'/photos/mountains.jpg')
                //Categorías
                ->type('categoria[]','Categoria 1')
                ->type('distancia[]','29')
                ->select('unidadDistancia[]')
                ->radio('rama[]', 'FEMENIL')
                ->type('precio[]','1582')
                ->press('Añadir categoría')
                ->type('categoria[]','Categoria 2')
                ->type('distancia[]','52')
                ->select('unidadDistancia[]')
                ->radio('rama[]', 'VARONIL')
                ->type('precio[]','2586')
                //Entrega de kits
                ->type('lugarEntregaKits','Laravel BD')
                ->type('fechaInicioEntregaKits','28/08/2023')
                ->select('horaInicioEntregaKits')
                ->select('minutoInicioEntregaKits')
                ->select('periodoInicioEntregaKits')
                ->press('Guardar')
                ->assertPathIs('/eventos')
                ->assertSee('El evento ha sido agregado exitosamente.')
                ->screenshot('test_evento_admin_store')
                ;
        });
    }

    //Tests desde el submenu de la card
    public function test_evento_admin_ver_info_desde_submenu()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("#dropdownButton{$evento->id}")
                ->clickLink('Ver información')
                ->assertSee($evento->nombre)
                ->assertSee($evento->descripcion)
                ->assertSee($evento->lugarEvento)
                ->screenshot('test_evento_admin_ver_info_desde_submenu')
                ;
        });
    }

    public function test_evento_admin_ver_imagenes_desde_submenu()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("#dropdownButton{$evento->id}")
                ->clickLink('Ver imágenes')
                ->assertSee($evento->nombre)
                ->screenshot('test_evento_admin_ver_imagenes_desde_submenu')
                ;
        });
    }

    public function test_evento_admin_ir_a_editar_desde_submenu()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("#dropdownButton{$evento->id}")
                ->click("@editar{$evento->id}")
                ->assertPathIs("/eventos/edit/{$evento->id}")
                ->assertSee($evento->nombre)
                ->screenshot('test_evento_admin_ir_a_editar_desde_submenu')
                ;
        });
    }

    public function test_evento_admin_eliminar_desde_submenu()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("#dropdownButton{$evento->id}")
                ->clickLink('Eliminar')
                ->press('Sí, estoy seguro')
                ->assertSee("El evento ha sido eliminado exitosamente")
                ->assertDontSee($evento->nombre)
                ->screenshot('test_evento_admin_eliminar_desde_submenu')
                ;
        });
    }

    public function test_evento_admin_click_foto()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("@img{$evento->id}")
                ->screenshot('test_evento_admin_click_foto')
                ;
        });
    }

    //Tests dando click al nombre, y se abre el modal a la derecha
    public function test_evento_admin_ver_info_desde_modal()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("@titulo{$evento->id}")
                ->assertSee($evento->nombre)
                ->assertSee($evento->descripcion)
                ->assertSee($evento->lugarEvento)
                ->screenshot('test_evento_admin_ver_info')
            ;
        });
    }

    public function test_evento_admin_ver_competidores_inscritos_desde_modal()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $competidores = Competidor::with('sub_evento')
                                  ->where(function ($query) use ($evento){
                                      $query->whereHas('sub_evento',function ($quer) use ($evento){
                                          $quer->where('evento_id','=',$evento->id);
                                      });
                                  })
                                  ->get();

        $this->browse(function (Browser $browser) use ($user,$evento,$competidores) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("@titulo{$evento->id}")
                ->assertSee($evento->nombre)
                ->assertSee($evento->descripcion)
                ->assertSee($evento->lugarEvento)
                ->click("@competidores{$evento->id}");

            if(count($competidores) == 0){
                $browser->assertSee("Aún no hay competidores inscritos :(.");
            }else{
                $elements = $browser->driver->findElements(WebDriverBy::name('tRow'));
                $this->assertCount(count($competidores), $elements);
            }
            $browser->screenshot('test_evento_admin_ver_competidores_inscritos');
        });
    }

    public function test_evento_admin_editar_desde_modal()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("@titulo{$evento->id}")
                ->assertSee($evento->nombre)
                ->assertSee($evento->descripcion)
                ->assertSee($evento->lugarEvento)
                ->click("#editar$evento->id")
                ->assertPathIs("/eventos/edit/{$evento->id}")
                ->screenshot('test_evento_admin_editar')
                ;
        });
    }

    public function test_evento_admin_eliminar_desde_modal()
    {
        $user = User::find(1);
        $eventos = Evento::all()->pluck('id');
        $id = $eventos->random();
        $evento = Evento::find($id);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->resize(1920, 3000)
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click("@titulo{$evento->id}")
                ->assertSee($evento->nombre)
                ->assertSee($evento->descripcion)
                ->assertSee($evento->lugarEvento)
                ->click("@eliminar$evento->id")
                ->press('Sí, estoy seguro')
                ->assertSee("El evento ha sido eliminado exitosamente")
                ->assertDontSee($evento->nombre)
                ->screenshot('test_evento_admin_eliminar')
                ;
        });
    }

}
