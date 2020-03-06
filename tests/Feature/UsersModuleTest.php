<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    /** @test */
    function welcome_Home()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Home');
    }

    /** @test */
    function it_loads_the_users_list_page()
    {
        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('Juan')
            ->assertSee('Pedro');
    }

    /** @test */
    function it_loads_the_users_details_page()
    {
        $this->get('/users/5')
            ->assertStatus(200)
            ->assertSee('Mostrar detalle de usuario: 5');
    }

    /** @test */
    function it_loads_the_new_users_page()
    {
        $this->get('/users/new')
            ->assertStatus(200)
            ->assertSee('Crear usuario nuevo');
    }
}
