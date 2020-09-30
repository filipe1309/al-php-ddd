<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Cpf;
use Alura\Arquitetura\Email;

class Aluno
{
    private Cpf $cpf;
    private string $nome;
    private Email $email;
    private array $telefones;

    // Named constructor
    public static function comCpfNomeEEmail(string $cpf, string $nome, string $email): self
    {
        return new Aluno(new Cpf($cpf), $nome, new Email($email));
    }

    public function __construct(Cpf $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function addTelefone($ddd, $numero)
    {
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }
}