<?php

namespace Alura\Arquitetura\Aluno;

class Telefone
{
    private string $ddd;
    private string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->setDdd($ddd);
        $this->setNumero($numero);
    }

    private function setDdd($ddd): void
    {
        // Guard clause
        if (preg_match('/^\d{2}$/', $ddd) !== 1) {
            throw new \InvalidArgumentException('DDD invalido');
        }

        $this->ddd = $ddd;
    }

    private function setNumero($numero): void
    {
        // Guard clause
        if (preg_match('/^\d{8,9}$/', $numero) !== 1) {
            throw new \InvalidArgumentException('Numero de telefone invalido');
        }

        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->numero}";
    }
}