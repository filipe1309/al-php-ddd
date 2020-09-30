<?php

namespace Alura\Arquitetura\Tests;

use Alura\Arquitetura\Aluno\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testTelefoneDevePoderSerRepresentadoComoString()
    {
        $telefone = new Telefone('41', '12345678');
        $this->assertSame('(41) 12345678', (string) $telefone);
    }
    
    public function testTelefoneComDddInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('DDD invalido');
        new Telefone('412', '12345678');
    }

    public function testTelefoneComNumeroInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Numero de telefone invalido');
        new Telefone('41', 'numero');
    }
}