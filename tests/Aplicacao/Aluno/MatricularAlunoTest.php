<?php

namespace Alura\Arquitetura\Tests\Aplicacao\Aluno;

use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        // Arrange
        $dadosAluno = new MatricularAlunoDto('012.345.678-90', 'Teste', 'aluno@test.com');
        $repositorioDeAluno = new RepositorioDeAlunoEmMemoria();
        $useCase = new MatricularAluno($repositorioDeAluno);
        
        // Act
        $useCase->executa($dadosAluno);

        // Assert
        $aluno = $repositorioDeAluno->buscarPorCpf(new Cpf('012.345.678-90'));
        $this->assertSame('Teste', (string) $aluno->nome());
        $this->assertSame('aluno@test.com', (string) $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }
}