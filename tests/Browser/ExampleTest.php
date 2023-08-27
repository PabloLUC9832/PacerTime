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


}
