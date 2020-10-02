<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Cpf;

class LogDeAlunoMatriculado
{
    public function reageAo(AlunoMatriculado $alunoMatriculado): void
    {
        fprintf(STDERR, 
            'Aluno com cpf %s foi matriculado na data %s',
            (string) $alunoMatriculado->cpfAluno(),
            $alunoMatriculado->momento()->format('d/m/Y'),
        );
    }
}