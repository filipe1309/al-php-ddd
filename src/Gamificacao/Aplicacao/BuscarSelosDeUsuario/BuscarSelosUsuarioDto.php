<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosDeUsuario;


class BuscarSelosDeUsuarioDto
{
    private string $cpfAluno;

    public function __construct(string $cpfAluno)
    {
        $this->cpfAluno = $cpfAluno;
    }
}