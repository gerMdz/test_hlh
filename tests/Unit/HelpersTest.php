<?php

namespace Tests\Unit;

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
       $respuesta =  validation_mail('gerardo.montivero@gmail.com');

        $this->assertTrue($respuesta);
    }
}
