<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function welcome_Home()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Home');
    }

    /** @test */
    function it_shows_the_users_list()
    {
        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios');
    }

    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        DB::table('users')->truncate();

        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados');
    }

    /** @test */
    function it_loads_the_users_details_page()
    {
        $user = factory(User::class)->create ([
            'name' => 'Lara Cejas'
        ]);

        $this->get('/users/'.$user->id)
            ->assertStatus(200)
            ->assertSee('Lara Cejas');
    }

    /** @test */
    function it_loads_the_new_users_page()
    {
        $this->get('/users/new')
            ->assertStatus(200)
            ->assertSee('Crear usuario nuevo');
    }
}
