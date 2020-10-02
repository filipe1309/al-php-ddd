<?php

namespace Alura\Arquitetura\Academico\Dominio;

class Cpf
{
    private string $numero;

    public function __construct(string $numero)
    {
        // Self encapsulation
        $this->setNumero($numero);
    }

    private function setNumero($numero): void
    {

        $opcoes = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        // Guard clause
        if (filter_var($numero, FILTER_VALIDATE_REGEXP, $opcoes) === false) {
            throw new \InvalidArgumentException('Cpf no formato invalido');
        }

        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return $this->numero;
    }
}