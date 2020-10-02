<?php

namespace Alura\Arquitetura\Tests\Dominio;

use Alura\Arquitetura\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('123456');
    }

    public function testEmailDevePoderSerRepresentadoComoString()
    {
        $email = new Email('endereco@test.com');
        $this->assertSame('endereco@test.com', (string) $email);
    }
}