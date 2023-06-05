<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $this->assertDatabaseHas('tasks', [
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente'
        ]);
    }
}
