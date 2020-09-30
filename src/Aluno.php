<?php

namespace Alura\Arquitetura;

class Aluno
{
    private Cpf $cpf;
    private string $nome;
    private Email $email;
    private array $telefones;

    public function addTelefone($ddd, $numero)
    {
        $this->telefones[] = new Telefone($ddd, $numero);
    }
}