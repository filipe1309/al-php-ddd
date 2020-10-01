<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoNaoEncontradoException;

class RepositorioDeAlunoComDoctrine implements RepositorioDeAluno
{
    private array $alunos = []; 

    private \PDO $conexao;

    public function __construct(\PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function adicionar(Aluno $aluno): void
    {
        // TODO
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        // TODO
    }
    
    public function buscarTodos(): array
    {
        // TODO
    }
}