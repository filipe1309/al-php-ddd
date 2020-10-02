<?php

namespace Alura\Arquitetura\Tests\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Dominio\Aluno\AlunoCom2TelefonesException;

class AlunoTest extends TestCase
{
    public function testAlunoNaoPodeTerMaisQue2Telefones()
    {
        $this->expectException(AlunoCom2TelefonesException::class);
        $this->expectDeprecationMessage('Aluno ja tem 2 telefones, nao eh possivel add outro.');
        $aluno = Aluno::comCpfNomeEEmail('012.345.678-90', 'Bob Dylan', 'test@example.com');
        $aluno->adicionarTelefone('41', '123465789')->adicionarTelefone('41', '12346578')->adicionarTelefone('41', '987654321');
    }
}