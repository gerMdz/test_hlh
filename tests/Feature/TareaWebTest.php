<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TareaWebTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tarea_creada_success_por_web()
    {
        Storage::fake();

        $user = User::factory()->create();

        $this->actingAs($user);

        $imagen = UploadedFile::fake()->image('avatar.png');
        $response = $this->post(route('tarea.store'), [
            'nombre' => 'Prueba 1',
            'descripcion' => 'Descripción Prueba 1',
            'status' => 'pendiente',
            'image' => $imagen
        ]);

        Storage::assertExists('tareas/' . $imagen->hashName());

        $response->assertRedirect(route('tarea.index'));


    }
}
