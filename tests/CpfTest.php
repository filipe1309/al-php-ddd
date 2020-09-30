<?php

namespace Alura\Arquitetura\Tests;

use Alura\Arquitetura\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfComNumeroNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf('1232032013021323.3213');
    }

    public function testCpfDevePoderSerRepresentadoComoString()
    {
        $cpf = new Cpf('012.345.678-90');
        $this->assertSame('012.345.678-90', (string) $cpf);
    }
}