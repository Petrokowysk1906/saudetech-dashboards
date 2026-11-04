<?php
namespace App\Repositories;

use PDO;

/**
 * Consultas SQL do Dashboard.
 *
 * Cada método executa UMA consulta no banco saudetech e devolve as linhas.
 * Formato esperado para virar gráfico (o mesmo do roteiro SQL):
 *   - 1ª coluna  = rótulo (categoria, mês, nome...)
 *   - demais     = números (uma série do gráfico por coluna numérica)
 */
class DashboardRepository
{
    public function __construct(private PDO $pdo) {}

    /** Executa um SELECT e devolve todas as linhas. */
    private function consultar(string $sql): array
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // =========================================================================
    // EXEMPLOS (já prontos — servem de modelo)
    // =========================================================================

    /** Cartão: total de vistorias cadastradas. */
    public function totalVistorias(): int
    {
        return (int)$this->pdo->query("SELECT COUNT(*) FROM vistorias")->fetchColumn();
    }

    /** Cartão: total de estabelecimentos cadastrados. */
    public function totalEstabelecimentos(): int
    {
        return (int)$this->pdo->query("SELECT COUNT(*) FROM estabelecimentos")->fetchColumn();
    }

    /** Gráfico de exemplo: quantos usuários existem em cada perfil. */
    public function usuariosPorPerfil(): array
    {
        return $this->consultar("
            SELECT perfil   AS perfil,
                   COUNT(*) AS quantidade
              FROM usuarios
             GROUP BY perfil
             ORDER BY quantidade DESC
        ");
    }

    // =========================================================================
    // ALUNO — SEU INDICADOR
    // Substitua a consulta abaixo pela consulta do indicador que você escolheu
    // (I01 a I12 do roteiro SQL), exatamente como ela funcionou no DBeaver.
    // Regras:
    //   - só SELECT;
    //   - NÃO precisa do "SET search_path" (a conexão usa o schema configurado em DB_SCHEMA);
    //   - banco do laboratório: saudetech; schema atual: public;
    //   - não deixe ";" no final da consulta.
    // =========================================================================
    public function meuIndicador(): array
    {
        return $this->consultar("
            WITH dados_i06 AS (
                SELECT v.estabelecimento_id,
                       COUNT(iv.id) FILTER (
                           WHERE iv.status::text = 'nao_conforme'
                       ) AS nao_conformidades,
                       COUNT(iv.id) FILTER (
                           WHERE iv.status::text = 'nao_conforme'
                             AND iv.severidade::text = 'critico'
                       ) AS criticas,
                       COUNT(DISTINCT v.id) AS vistorias
                  FROM public.vistorias v
                  LEFT JOIN public.itens_vistoria iv
                    ON iv.vistoria_id = v.id
                 WHERE v.status::text IN ('finalizada', 'sincronizada')
                 GROUP BY v.estabelecimento_id
            )
            SELECT e.razao_social AS razao_social,
                   e.bairro AS bairro,
                   d.nao_conformidades,
                   d.criticas,
                   d.vistorias
              FROM dados_i06 d
              JOIN public.estabelecimentos e
                ON e.id = d.estabelecimento_id
             WHERE d.nao_conformidades > 0
             ORDER BY d.nao_conformidades DESC,
                      d.criticas DESC,
                      e.razao_social ASC
             LIMIT 10
        ");
    }
}
