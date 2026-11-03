-- ============================================================
-- Projeto SaúdeTech Dashboards
-- Grupo: I06
-- Indicador: estabelecimentos com mais não conformidades
-- Pergunta: Quais os 10 estabelecimentos com mais não conformidades?
-- Gráfico: ranking em barras horizontais
-- Colunas: razao_social, bairro, nao_conformidades, criticas
-- Banco: saudetech | Schema: public | Somente leitura
-- Validada no DBeaver em 03/11/2026; 10 linhas retornadas.
-- ============================================================

SELECT
    e.razao_social AS razao_social,
    e.bairro AS bairro,
    COUNT(*) AS nao_conformidades,
    COUNT(*) FILTER (WHERE iv.severidade::text = 'critico') AS criticas
FROM public.estabelecimentos e
JOIN public.vistorias v
    ON v.estabelecimento_id = e.id
JOIN public.itens_vistoria iv
    ON iv.vistoria_id = v.id
WHERE v.status::text IN ('finalizada', 'sincronizada')
  AND iv.status::text = 'nao_conforme'
GROUP BY e.id, e.razao_social, e.bairro
ORDER BY nao_conformidades DESC, criticas DESC, e.razao_social ASC
LIMIT 10;
