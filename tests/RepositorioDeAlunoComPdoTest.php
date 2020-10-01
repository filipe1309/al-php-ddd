<?php

namespace Alura\Arquitetura\Tests;

use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Infra\Aluno\RepositorioDeAlunoComPdo;
use PHPUnit\Framework\TestCase;

class RepositorioDeAlunoComPdoTest extends TestCase
{
    /** @var \PDO */
    private static $pdo;

    public static function setUpBeforeClass(): void
    {
        self::$pdo = new \PDO('sqlite::memory:');
        $sql = file_get_contents('banco.sql');
        self::$pdo->exec($sql);
    }

    protected function setUp(): void
    {
        self::$pdo->beginTransaction();
    }

    public function testAlunoDeveSerInseridoNaBase()
    {
        // Arrange
        $repositorioDeAlunosPdo = new RepositorioDeAlunoComPdo(self::$pdo);
        $aluno1 = Aluno::comCpfNomeEEmail('012.345.678-90', 'Bob Dylan 1', 'bob1@test.com');
        $aluno2 = Aluno::comCpfNomeEEmail('012.345.678-91', 'Bob Dylan 2', 'bob2@test.com');
        $aluno2->adicionarTelefone('41', '12345678')->adicionarTelefone('42', '87456321');
        $aluno3 = Aluno::comCpfNomeEEmail('012.345.678-92', 'Bob Dylan 3', 'bob3@test.com');
        $aluno3->adicionarTelefone('43', '987456321');

        // Act
        $repositorioDeAlunosPdo->adicionar($aluno1);
        $repositorioDeAlunosPdo->adicionar($aluno2);
        $repositorioDeAlunosPdo->adicionar($aluno3);

        // Assert
        $totalAlunosInseridos = self::$pdo->query('select count(*) from alunos')->fetchColumn();
        self::assertEquals(3, $totalAlunosInseridos);
    }

    protected function tearDown(): void
    {
        self::$pdo->rollBack();
    }
}