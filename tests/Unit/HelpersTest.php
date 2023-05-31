<?php

namespace Tests\Unit;

use App\Http\Helpers\DefaultHelper;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mail_validation()
    {
        $defaultHelper = new DefaultHelper();
        $respuesta = $defaultHelper->validation_mail('gerardo.montivero@gmail.com');

        $this->assertTrue($respuesta);
    }

    public function test_mail_validation_fails()
    {
        $defaultHelper = new DefaultHelper();
        $respuesta = $defaultHelper->validation_mail('gerardo.montivero@gmail');

        $this->assertFalse($respuesta);
    }
}
