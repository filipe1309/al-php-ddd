<?php

namespace Alura\Arquitetura\Infra\Indicacao;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Aplicacao\Indicacao\EnviaEmailIndicacao;

class EnviaEmailIndicacaoPhp implements EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void
    {
        // TODO
    }
}