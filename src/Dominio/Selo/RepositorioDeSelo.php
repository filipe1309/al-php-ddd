<?php

namespace Alura\Arquitetura\Dominio\Selo;

use Alura\Arquitetura\Dominio\Cpf;

interface RepositorioDeSelo
{
    public function adiciona(Selo $selo): void;
    public function selosDeAlunoComCpf(Cpf $cpf);
}