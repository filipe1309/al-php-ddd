<?php

require 'vendor/autoload.php';

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\PublicadorDeEvento;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;

$cpf    = $argv[1];
$nome   = $argv[2];
$email  = $argv[3];
// $ddd    = $argv[4];
// $numero = $argv[5];

// $aluno = Aluno::comCpfNomeEEmail($cpf, $nome, $email)->adicionarTelefone($ddd, $numero);
// $repositorio = new RepositorioDeAlunoEmMemoria();
// $repositorio->adicionar($aluno);

$repositorio = new RepositorioDeAlunoEmMemoria();
$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogDeAlunoMatriculado());
$useCase = new MatricularAluno($repositorio, $publicador);

$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));