<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\OuvinteDeEvento;
use Alura\Arquitetura\Academico\Dominio\Evento;

class LogDeAlunoMatriculado extends OuvinteDeEvento
{
    public function reageAo(Evento $alunoMatriculado): void
    {
        fprintf(STDERR, 
            'Aluno com cpf %s foi matriculado na data %s',
            (string) $alunoMatriculado->cpfAluno(),
            $alunoMatriculado->momento()->format('d/m/Y'),
        );
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento instanceof AlunoMatriculado;
    }

}