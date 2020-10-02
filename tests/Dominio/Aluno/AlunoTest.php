<?php

namespace Alura\Arquitetura\Tests\Dominio\Aluno;

use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\{ Cpf, Email };
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoCom2TelefonesException;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    public function setUp(): void
    {
        $this->aluno = new Aluno(
            $this->createStub(Cpf::class),
            '',
            $this->createStub(Email::class),
        );
    }

    public function testAlunoNaoPodeTerMaisQue2Telefones()
    {
        $this->expectException(AlunoCom2TelefonesException::class);
 
        $this->expectDeprecationMessage('Aluno ja tem 2 telefones, nao eh possivel add outro.');
        $aluno = Aluno::comCpfNomeEEmail('012.345.678-90', 'Bob Dylan', 'test@example.com');
        $aluno->adicionarTelefone('41', '123465789')->adicionarTelefone('41', '12346578')->adicionarTelefone('41', '987654321');
    }

    public function testAdicionar1TelefoneDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('41', '123465789');

        $this->assertCount(1, $this->aluno->telefones());
    }

    public function testAdicionar2TelefonesDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('41', '123465789')->adicionarTelefone('41', '12346578');

        $this->assertCount(2, $this->aluno->telefones());
    }
}