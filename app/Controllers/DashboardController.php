<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\DashboardRepository;
use PDOException;

/**
 * Página Dashboard: busca os dados no repositório e entrega para a view.
 * (Neste laboratório você NÃO precisa mexer neste arquivo.)
 */
class DashboardController extends Controller
{
    /** Retorna o ranking I06 do banco para o protótipo acadêmico local. */
    public function indicadorI06(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: no-store, private');

        try {
            $repo = new DashboardRepository($this->pdo);
            echo json_encode($repo->meuIndicador(), JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
        } catch (PDOException $e) {
            http_response_code(503);
            echo json_encode(['erro' => 'Não foi possível carregar o indicador I06.'], JSON_UNESCAPED_UNICODE);
        }
    }

    public function index(): void
    {
        $repo = new DashboardRepository($this->pdo);

        // Se a consulta do aluno tiver erro de SQL, a página continua abrindo
        // e mostra a mensagem do PostgreSQL no lugar do gráfico.
        $erroMeuIndicador = null;
        try {
            $meuIndicador = $repo->meuIndicador();
        } catch (PDOException $e) {
            $meuIndicador = [];
            $erroMeuIndicador = $e->getMessage();
        }

        $this->render('dashboard/index', [
            'totalVistorias'        => $repo->totalVistorias(),
            'totalEstabelecimentos' => $repo->totalEstabelecimentos(),
            'usuariosPorPerfil'     => $repo->usuariosPorPerfil(),
            'meuIndicador'          => $meuIndicador,
            'erroMeuIndicador'      => $erroMeuIndicador,
        ]);
    }
}
