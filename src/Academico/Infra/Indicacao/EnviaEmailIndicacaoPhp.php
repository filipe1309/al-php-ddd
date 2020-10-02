<?php

namespace Alura\Arquitetura\Academico\Infra\Indicacao;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Aplicacao\Indicacao\EnviaEmailIndicacao;

class EnviaEmailIndicacaoPhp implements EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void
    {
        // TODO
    }
}