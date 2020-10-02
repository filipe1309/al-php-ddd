<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Email;

interface RepositorioDeAluno
{
    public function adicionar(Aluno $aluno): void;

    public function buscarPorCpf(Cpf $aluno): Aluno;
    
    // public function removerPorCpf(Cpf $aluno): Aluno;

    public function buscarTodos(): array;
}