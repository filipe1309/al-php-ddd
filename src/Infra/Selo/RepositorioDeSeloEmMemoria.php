<?php

namespace Alura\Arquitetura\Infra\Selo;

use Alura\Arquitetura\Dominio\Cpf;

class RepositorioDeSeloEmMemoria implements RepositorioDeSelo
{
    private array $selos = [];

    public function adiciona(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function selosDeAlunoComCpf(Cpf $cpf)
    {
        return array_filter($this->selos, fn ($selo) => $selo->cpfAluno() === ((string) $cpf));
    }
}