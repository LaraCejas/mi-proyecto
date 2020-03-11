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
    function it_display_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/users/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

    /** @test */
    function it_loads_the_new_users_page()
    {
        $this->get('/users/new')
            ->assertStatus(200)
            ->assertSee('Crear usuario nuevo');
    }

    //** @test */
    function it_create_a_new_user()
    {
        $this->post('/users', [
            'name' => 'Lara',
            'lastName' => 'Cejas',
            'email' => 'malaracejas@gmail.com',
            'password' => 'laravel'
        ])->assertRedirect('users');

        $this->assertCredentials([
            'name' => 'Lara',
            'lastName' => 'Cejas',
            'email' => 'malaracejas@gmail.com',
            'password' => 'laravel',
        ]);
    }
}
