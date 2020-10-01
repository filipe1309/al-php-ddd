<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Cpf;
use Alura\Arquitetura\Email;

interface RepositorioDeAluno
{
    public function adicionar(Aluno $aluno): void;

    public function buscarPorCpf(Cpf $aluno): Aluno;
    
    // public function removerPorCpf(Cpf $aluno): Aluno;

    public function buscarTodos(): array;
}