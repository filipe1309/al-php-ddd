<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoNaoEncontradoException;

class RepositorioDeAlunoEmMemoria implements RepositorioDeAluno
{
    private array $alunos = []; 

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $alunosFiltrados = array_filter($this->alunos, fn (Aluno $aluno) => (string) $aluno->cpf() === (string) $cpf);
        
        if (count($alunosFiltrados) == 0) {
            throw new AlunoNaoEncontradoException;
        }

        if (count($alunosFiltrados) > 1) {
            throw new \DomainException('Cpfs repetidos na base!!!!');
        }

        return $alunosFiltrados[0];
    }
    
    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}