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

Crea carpeta que enlace el storage con public
```bash
php artisan storage:link 
```

Cambiar el .env
```env
-- FILESYSTEM_DRIVER=local
++ FILESYSTEM_DRIVER=public
```

Compara la estructura de una respuesta Json
```php
$response->assertJsonStructure
```

Para filtrar los test a ejecutar 
```php
php artisan test --filter=EjecutarSoloUnTest.php
```

Instalar el paquete jwt
```php
composer require tymon/jwt-ath
```

Para publicar la configuración del jwt 
```php
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

Para generar el secret jwt 
```php
php artisan jwt:secret
```


#### Next
[Cap 19](https://codersfree.com/courses-status/introduccion-a-las-pruebas-automatizadas-con-laravel-tdd/prueba-login)
1

