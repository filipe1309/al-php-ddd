<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Cpf;

class AlunoCom2TelefonesException extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Aluno ja tem 2 telefones, nao eh possivel add outro.');
    }
} 