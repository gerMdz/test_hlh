<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TareasTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tarea_creada_dos()
    {
        $response = $this->post(route('tarea.store'), [
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente'
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente'
        ]);
        $this->assertDatabaseHas('tasks', [
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente'
        ]);
    }

    public function test_not_validated()
    {
        $response = $this->post(route('tarea.store'), [
            'nombre' => '',
            'descripcion' => '',
            'status' => ''
        ], ['Accept' => 'application/json']);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            "message",
            "errors"
        ]);
//        $this->assertDatabaseHas('tasks', [
//            'nombre' => 'Prueba 1',
//            'descripcion' => 'Descripción Prueba 1',
//            'status' => 'pendiente'
//        ]);

    }
}
