<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosDeUsuario;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;

class BuscarSelosDeUsuario
{
    private RepositorioDeSelo $repositorioDeSelo;

    public function __construct(RepositorioDeSelo $repositorioDeSelo)
    {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }

    public function execute(BuscarSelosDeUsuarioDto $dados)
    {
        $cpfAluno = new Cpf($dados->cpfAluno);
        return $this->repositorioDeSelo->selosDeAlunoComCpf($cpfAluno);
    }
}