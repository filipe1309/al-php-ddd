<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Cpf;

class AlunoNaoEncontradoException extends \DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Aluno com CPF $cpf nao encontrado");
    }
} 