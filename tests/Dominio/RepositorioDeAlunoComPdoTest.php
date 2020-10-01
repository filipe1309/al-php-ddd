<?php

namespace Alura\Arquitetura\Tests\Dominio;

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
    
    /**
     * @dataProvider alunos
     */
    public function testAlunoDeveSerInseridoNaBase(array $alunos)
    {
        // Arrange
        $repositorioDeAlunosPdo = new RepositorioDeAlunoComPdo(self::$pdo);

        // Act
        foreach ($alunos as $aluno) {
            $repositorioDeAlunosPdo->adicionar($aluno);
        }

        // Assert
        $totalAlunosInseridos = self::$pdo->query('select count(*) from alunos')->fetchColumn();
        self::assertEquals(3, $totalAlunosInseridos);
    }

    /**
     * @dataProvider alunos
     */
    public function testBuscarAlunoPorCpf(array $alunos)
    {
        // Arrange
        $repositorioDeAlunosPdo = new RepositorioDeAlunoComPdo(self::$pdo);
        foreach ($alunos as $aluno) {
            $repositorioDeAlunosPdo->adicionar($aluno);
        }

        // Act
        $aluno0 = $repositorioDeAlunosPdo->buscarPorCpf($alunos[0]->cpf());

        // Assert
        self::assertSame((string) $aluno0->cpf(),(string)  $alunos[0]->cpf());
    }

    /**
     * @dataProvider alunos
     */
    public function testTodosalunosSaoBuscadosDaBase(array $alunos)
    {
        // Arrange
        $repositorioDeAlunosPdo = new RepositorioDeAlunoComPdo(self::$pdo);
        foreach ($alunos as $aluno) {
            $repositorioDeAlunosPdo->adicionar($aluno);
        }

        // Act
        $totalAlunosInseridos = $repositorioDeAlunosPdo->buscarTodos();

        // Assert
        self::assertCount(3, $totalAlunosInseridos);
    }

    protected function tearDown(): void
    {
        self::$pdo->rollBack();
    }

    
    public function alunos() {
        $aluno1 = Aluno::comCpfNomeEEmail('012.345.678-90', 'Bob Dylan 1', 'bob1@test.com');
        $aluno2 = Aluno::comCpfNomeEEmail('012.345.678-91', 'Bob Dylan 2', 'bob2@test.com');
        $aluno2->adicionarTelefone('41', '12345678')->adicionarTelefone('42', '87456321');
        $aluno3 = Aluno::comCpfNomeEEmail('012.345.678-92', 'Bob Dylan 3', 'bob3@test.com');
        $aluno3->adicionarTelefone('43', '987456321');

        return [
            [
                [$aluno1, $aluno2, $aluno3]
            ]
        ];
    }
}