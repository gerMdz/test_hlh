<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class TareasApiTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tarea_creada_success_por_api()
    {
        Storage::fake();

        $user = User::factory()->create();

        $userToken = JWTAuth::fromUser($user);

        $imagen = UploadedFile::fake()->image('avatar.png');
        $response = $this->postJson(route('api.tarea.store'), [
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente',
            'image' => $imagen
        ], [
            'Authorization' => 'Bearer ' . $userToken
        ]);

        $response->assertStatus(200);

        Storage::assertExists('public/tareas/' . $imagen->hashName());

        $response->assertJson([
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente',
            'image' => 'public/tareas/' . $imagen->hashName(),
            'user_id' => $user->id

        ]);
        $this->assertDatabaseHas('tasks', [
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente',
            'image' => 'public/tareas/' . $imagen->hashName()
        ]);
    }

//    public function test_not_validated()
//    {
//        $response = $this->post(route('tarea.store'), [
//            'nombre' => '',
//            'descripcion' => '',
//            'status' => ''
//        ], ['Accept' => 'application/json']);
//
//        $response->assertStatus(422);
//
//        $response->assertJsonStructure([
//            "message",
//            "errors"
//        ]);
//        $this->assertDatabaseHas('tasks', [
//            'nombre' => 'Prueba 1',
//            'descripcion' => 'Descripción Prueba 1',
//            'status' => 'pendiente'
//        ]);

//    }

    public function test_tarea_no_creada_no_auth()
    {
        Storage::fake();

        $imagen = UploadedFile::fake()->image('avatar.png');

        $response = $this->postJson(route('api.tarea.store'), [
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente',
            'image' => $imagen
        ]);

        $response->assertStatus(401);

        $response->assertJson([
            'message' => 'Unauthenticated.'

        ]);
    }
}
