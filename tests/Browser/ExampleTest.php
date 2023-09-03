<?php

namespace Tests\Browser;

use App\Models\Evento;
use App\Models\User;
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
        /*
        $eventos = Evento::all();
        $nombres = [];
        foreach ($eventos as $item) {
            $nombres []= $item->nombre;
        };
        */
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/eventos')
                    ->assertRouteIs('eventos.index')
                    ->assertTitle("Inicio | Pacer Time")
                    ->assertSee($user->name)
                    //->assertSee($nombres)
                    ;
        });
    }

    public function test_evento_admin_create(): void
    {
        $user = User::find(1);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/eventos/create')
                ->assertRouteIs('eventos.create')
                ->assertTitle("Crear evento")
                ;
        });
    }

    public function test_evento_admin_store()
    {
        $user = User::find(1);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/eventos/create')
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
            ;
        });
    }

    public function test_evento_admin_ver_info()
    {
        $user = User::find(1);
        $evento = Evento::find(1);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click('@titulo1')
                ->assertSee($evento->nombre)
                ->assertSee($evento->descripcion)
                ->assertSee($evento->lugarEvento)
                ->screenshot('filename');
                ;
        });
    }

    public function test_evento_admin_ver_info_desde_submenu()
    {
        $user = User::find(1);
        $evento = Evento::find(1);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click('#dropdownButton1')
                ->clickLink('Ver información')
                ->assertSee($evento->nombre)
                ->assertSee($evento->descripcion)
                ->assertSee($evento->lugarEvento)
                ->screenshot('filename')
                ;
        });
    }

    public function test_evento_admin_ver_imagenes_desde_submenu()
    {
        $user = User::find(1);
        $evento = Evento::find(1);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click('#dropdownButton1')
                ->clickLink('Ver imágenes')
                ->assertSee($evento->nombre)
                ->screenshot('filename')
                ;
        });
    }

    public function test_evento_admin_editar_desde_submenu()
    {
        $user = User::find(1);
        $evento = Evento::find(1);

        $this->browse(function (Browser $browser) use ($user,$evento) {
            $browser->loginAs($user)
                ->visit('/eventos')
                ->assertRouteIs('eventos.index')
                ->assertTitle("Inicio | Pacer Time")
                ->click('#dropdownButton1')
                ->clickLink('Editar')
                ->assertPathIs('/eventos/edit/1')
                ->assertSee($evento->nombre)
                ->screenshot('filename')
            ;
        });
    }

}
