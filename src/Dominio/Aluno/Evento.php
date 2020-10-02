<?php

namespace Alura\Arquitetura\Dominio\Aluno;

interface Evento
{
    public function momento(): \DateTimeImmutable;
}