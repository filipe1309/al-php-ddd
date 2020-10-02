<?php

require 'vendor/autoload.php';

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;
use Alura\Arquitetura\Gamificacao\Aplicacao\GeraSeloDeNovato;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Gamificacao\Infra\Selo\RepositorioDeSeloEmMemoria;
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
$publicador->adicionarOuvinte(new GeraSeloDeNovato(new RepositorioDeSeloEmMemoria()));


$useCase = new MatricularAluno($repositorio, $publicador);

$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));