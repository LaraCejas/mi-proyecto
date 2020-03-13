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
            'name' => 'Lara',
            'lastName' => 'Cejas',
        ]);

        $this->get("/users/{$user->id}")
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
            ->assertSee('Crear usuario');
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

    //** @test */
    function the_name_is_required()
    {
        $this->from('users/new')
            ->post('/users', [
                'name' => '',
                'lastName' => 'Cejas',
                'email' => 'malaracejas@gmail.com',
                'password' => 'laravel'
            ]) 
            ->assertRedirect('users/new')
            ->asserSessiontHasErrors(['name' => 'El nombre es obligatorio']);

        $this->assertEquals(0, User::count());
    }

    //** @test */
    function the_lastName_is_required()
    {
        $this->from('users/new')
            ->post('/users', [
                'name' => 'Lara',
                'lastName' => '',
                'email' => 'malaracejas@gmail.com',
                'password' => 'laravel'
            ]) 
            ->assertRedirect('users/new')
            ->asserSessiontHasErrors(['lastName']);

        $this->assertEquals(0, User::count());
    }

    //** @test */
    function the_email_is_required()
    {
        $this->from('users/new')
            ->post('/users', [
                'name' => 'Lara',
                'lastName' => 'Cejas',
                'email' => '',
                'password' => 'laravel'
            ]) 
            ->assertRedirect('users/new')
            ->asserSessiontHasErrors(['email']);

        $this->assertEquals(0, User::count());
    }

    //** @test */
    function the_email_must_be_valid()
    {
        $this->from('users/new')
            ->post('/users', [
                'name' => 'Lara',
                'lastName' => 'Cejas',
                'email' => 'correo-no-valido',
                'password' => 'laravel'
            ]) 
            ->assertRedirect('users/new')
            ->asserSessiontHasErrors(['email']);

        $this->assertEquals(0, User::count());
    }

    //** @test */
    function the_email_must_be_unique()
    {
        factory(User::class)->create([
            'email' => 'malaracejas@gmail.com',
        ]);

        $this->from('users/new')
            ->post('/users', [
                'name' => 'Lara',
                'lastName' => 'Cejas',
                'email' => 'malaracejas@gmail.com',
                'password' => 'laravel'
            ]) 
            ->assertRedirect('users/new')
            ->asserSessiontHasErrors(['email']);

        $this->assertEquals(1, User::count());
    }

    //** @test */
    function the_password_is_required()
    {
        $this->from('users/new')
            ->post('/users', [
                'name' => 'Lara',
                'lastName' => 'Cejas',
                'email' => 'malaracejas@gmail.com',
                'password' => ''
            ]) 
            ->assertRedirect('users/new')
            ->asserSessiontHasErrors(['password']);

        $this->assertEquals(0, User::count());
    }

    /** @test */
    function it_loads_the_edit_user_page()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->get("/users/{$user->id}/edit")
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSee('Editar usuario')
            ->assertViewHas('user', function($viewUser) use($user) {
                return $viewUser->id == $user->id;
            });
    }

    //** @test */
    function it_updates_a_user()
    {
        $user = factory(User::class)->create();

        $this->put("/users/{$user->id}", [
            'name' => 'Lara',
            'lastName' => 'Cejas',
            'email' => 'malaracejas@gmail.com',
            'password' => 'laravel'
        ])->assertRedirect("/users/{$user->id}");

        $this->assertCredentials([
            'name' => 'Lara',
            'lastName' => 'Cejas',
            'email' => 'malaracejas@gmail.com',
            'password' => 'laravel',
        ]);
    }

    //** @test */
    function the_name_is_required_when_updating_a_user()
    {
        $user = factory(User::class)->create();

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => '',
                'lastName' => 'Cejas',
                'email' => 'malaracejas@gmail.com',
                'password' => 'laravel'
            ]) 
            ->assertRedirect("users/{$user->id}/edit")
            ->asserSessiontHasErrors(['name' => 'El nombre es obligatorio']);

        $this->assertDatabaseMissing('user', ['email' => 'malaracejas@gmail.com']);
    }

    //** @test */
    function the_lastName_is_required_when_updating_the_user()
    {
        $user = factory(User::class)->create();

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => 'Lara',
                'lastName' => '',
                'email' => 'malaracejas@gmail.com',
                'password' => 'laravel'
            ]) 
            ->assertRedirect("users/{$user->id}/edit")
            ->asserSessiontHasErrors(['name' => 'El nombre es obligatorio']);

        $this->assertDatabaseMissing('user', ['email' => 'malaracejas@gmail.com']);
    }

    //** @test */
    function the_email_must_be_valid_when_updating_the_user()
    {
        $user = factory(User::class)->create();

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => '',
                'lastName' => 'Cejas',
                'email' => 'correo-no-valido',
                'password' => 'laravel'
            ]) 
            ->assertRedirect("users/{$user->id}/edit")
            ->asserSessiontHasErrors(['email']);

        $this->assertDatabaseMissing('user', ['name' => 'Lara']);
    }

    //** @test */
    function the_email_must_be_unique_when_updating_the_user()
    {
        self::markTestIncomplete();
        return;

        $user = factory(User::class)->create([
            'email' => 'malaracejas@gmail.com',
        ]);

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => 'Lara',
                'lastName' => 'Cejas',
                'email' => 'malaracejas@gmail.com',
                'password' => 'laravel'
            ]) 
            ->assertRedirect('users/new')
            ->asserSessiontHasErrors(['email']);

        $this->assertEquals(1, User::count());
    }

    //** @test */
    function the_password_is_required_when_updating_the_user()
    {
        $user = factory(User::class)->create();

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => 'Lara',
                'lastName' => 'Cejas',
                'email' => 'malaracejas@gmail.com',
                'password' => ''
            ]) 
            ->assertRedirect("users/{$user->id}/edit")
            ->asserSessiontHasErrors(['password']);

            $this->assertDatabaseMissing('user', ['email' => 'malaracejas@gmail.com']);
    }
}
