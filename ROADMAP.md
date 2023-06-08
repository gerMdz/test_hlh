### Curso TDD en Laravel

#### Visto

Los métodos de test deben iniciar con la palabra 
> test_resto_del_method

Otra forma es agregando
```
/**
* @test
*/
```

Carpeta donde se crean los test
```bash
php artisan make:test TareasTest 
php artisan make:test HelpersTest --unit 
```
Compara la estructura de una respuesta Json
```php
$response->assertJsonStructure
```


#### Next
[Cap 11](https://codersfree.com/courses-status/introduccion-a-las-pruebas-automatizadas-con-laravel-tdd/prueba-subir-imagenes)
