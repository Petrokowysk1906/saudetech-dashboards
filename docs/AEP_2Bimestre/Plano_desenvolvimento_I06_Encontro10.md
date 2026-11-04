# Plano de desenvolvimento do indicador I06

- **SaúdeTech Dashboards · Encontro 10 · Grupo I06**
- **Data-base:** 03/11/2026 · **Prazo do trabalho:** 09/11/2026 23:59
- **Pergunta do indicador:** Quais são os 10 estabelecimentos com mais não conformidades?
- **Visualização:** ranking em barras horizontais e tabela de apoio
- **Repositório-base:** https://github.com/edenilsonburity/saudetech-dashboards
- **Fork do grupo:** criar na conta do grupo/aluno antes da Sprint 1
- **Branch:** `feature/dashboard-I06`
**Integrantes:** Arthur Luiz Oliveira da Rosa; Alysson Lino dos Santos; Eduardo Cesar Souza; Lenin Petrokowysk da Cunha; Maria Fernanda Mayumi Alves de Oliveira.

> Este plano acompanha o Encontro 10. A conexão PostgreSQL no Render foi configurada no DBeaver como banco `saudetech`, schema `public`, porta 5432, SSL `require` e somente leitura. O schema `public` contém as tabelas reais do projeto.

## 1. Identificação

| Campo | Definição |
|---|---|
| Grupo | I06 |
| Integrantes | Arthur Luiz Oliveira da Rosa; Alysson Lino dos Santos; Eduardo Cesar Souza; Lenin Petrokowysk da Cunha; Maria Fernanda Mayumi Alves de Oliveira |
| Indicador | I06 — estabelecimentos com mais não conformidades |
| Pergunta | Quais são os 10 estabelecimentos com mais não conformidades? |
| Gráfico | Barras horizontais (ranking), com tabela contendo bairro e quantidade de itens críticos |
| Fonte de dados | PostgreSQL SaúdeTech, schema `public`; consulta somente leitura |
| Repositório | Fork individual/grupo a criar a partir do repositório-base do professor |
| Branch | `feature/dashboard-I06 (branch de trabalho desta atividade)` conforme o manual do laboratório |

**Saída esperada da consulta:** `razao_social`, `bairro`, `nao_conformidades`, `criticas`, nessa ordem. Contam-se apenas vistorias finalizadas ou sincronizadas e itens com status `nao_conforme`.

**Informação complementar no cartão local:** total de vistorias finalizadas ou sincronizadas por estabelecimento (`vistorias`). O arquivo SQL de entrega mantém as quatro colunas exigidas no roteiro do professor.

## 2. EAP simplificada e tarefas

| Código | Pacote | Tarefas, responsável e prazo | Entregável | Prioridade |
|---|---|---|---|---|
| 1 | Preparação | 1.1 Criar fork, clonar e criar branch — Arthur Luiz Oliveira da Rosa — 03/11; 1.2 Subir ambiente Docker — Arthur Luiz Oliveira da Rosa — 03/11; 1.3 Configurar e testar conexão PostgreSQL/SSL em modo somente leitura — Alysson Lino dos Santos — 04/11 | Painel local acessível e conexão alvo confirmada | Deve |
| 2 | Dados | 2.1 Ajustar consulta I06 às colunas reais — Alysson Lino dos Santos — 04/11; 2.2 Executar consulta no DBeaver em somente leitura — Alysson Lino dos Santos — 04/11; 2.3 Tratar empate, resultado vazio e filtro de status — Maria Fernanda Mayumi Alves de Oliveira — 05/11 | `grupo_I06_consulta.sql` validada no DBeaver | Deve |
| 3 | Interface | 3.1 Definir título e pergunta do cartão — Eduardo Cesar Souza — 05/11; 3.2 Configurar barras horizontais — Eduardo Cesar Souza — 06/11; 3.3 Revisar legenda, rótulos e tema claro/escuro — Lenin Petrokowysk da Cunha — 06/11 | Indicador exibido no Dashboard | Deve (cartão); Deveria (acabamento) |
| 4 | Qualidade | 4.1 Conferir ranking, empates, filtro e dados vazios — Maria Fernanda Mayumi Alves de Oliveira — 07/11; 4.2 Revisão de SQL, tela e README por todo o grupo — Lenin Petrokowysk da Cunha — 08/11 | Checklist de revisão preenchido | Deveria |
| 5 | Entrega | 5.1 Commits convencionais — Arthur Luiz Oliveira da Rosa — 08/11; 5.2 Criar tag `v1.1.0` — Arthur Luiz Oliveira da Rosa — 09/11; 5.3 Abrir Pull Request para o repositório do professor — Arthur Luiz Oliveira da Rosa — 09/11 | Pull Request e tag publicados | Deve |

**Distribuição de código:** Arthur Luiz Oliveira da Rosa trabalha na configuração do projeto e entrega; Alysson Lino dos Santos na consulta e validação SQL; Eduardo Cesar Souza no cartão e gráfico; Lenin Petrokowysk da Cunha no refinamento da interface/README; Maria Fernanda Mayumi Alves de Oliveira nos casos-limite da consulta e filtros. A atribuição segue a ordem dos nomes informados pelo grupo; todos mantêm ao menos uma tarefa de código, conforme o Encontro 10.

## 3. Cronograma das Sprints

| Sprint | Período | Meta | Tarefas | Entrega | Situação inicial |
|---|---|---|---|---|---|
| 1 | 03–04/11/2026 | Ambiente e dados prontos | 1.1–1.3, 2.1–2.2 | Painel local e consulta I06 executada no DBeaver | Concluída; consulta executada em 03/11 e retornou 10 linhas |
| 2 | 05–06/11/2026 | Indicador visível no painel | 2.3, 3.1–3.3 | Cartão I06 com barras horizontais | Não iniciada |
| 3 | 07–09/11/2026 | Testes e entrega | 4.1–5.3 | Revisão, Pull Request e tag `v1.1.0` | Não iniciada |

**Revisão ao fim de cada Sprint:** registrar o que foi entregue, pendências, bloqueios e a mudança planejada para o ciclo seguinte. Se a conexão não funcionar, registrar mensagem de erro e comunicar o professor em 04/11 para manter prazo de recuperação.

## 4. Responsabilidades

| Tarefa | Responsável (R) | Apoio (A) | Prazo |
|---|---|---|---|
| Preparação e fork | Arthur Luiz Oliveira da Rosa | Alysson Lino dos Santos | 03/11 |
| Conexão e consulta SQL | Alysson Lino dos Santos | Maria Fernanda Mayumi Alves de Oliveira | 04/11 |
| Cartão e gráfico | Eduardo Cesar Souza | Lenin Petrokowysk da Cunha | 06/11 |
| Testes de borda e revisão | Maria Fernanda Mayumi Alves de Oliveira | Lenin Petrokowysk da Cunha | 08/11 |
| Commits, tag, PR e documentação | Arthur Luiz Oliveira da Rosa | Todo o grupo | 09/11 |

**Papéis:** Arthur Luiz Oliveira da Rosa — coordenação/integração; Alysson Lino dos Santos — dados e DBeaver; Eduardo Cesar Souza — interface; Lenin Petrokowysk da Cunha — documentação e revisão visual; Maria Fernanda Mayumi Alves de Oliveira — qualidade e casos-limite. A divisão segue a ordem da lista enviada pelo grupo.

## 5. Prioridades (MoSCoW)

| Prioridade | Entrega | Justificativa |
|---|---|---|
| Deve | Conexão correta e somente leitura; consulta SQL I06 validada; cartão visível; commits, tag e Pull Request | Núcleo técnico e entregas previstas pelo Encontro 10 |
| Deveria | Tratar erros, consulta sem linhas, empate no ranking e filtros | Evita resultados confusos e melhora a revisão |
| Poderia | Refinar cores, rótulos, legenda e comportamento responsivo | Melhoria visual se o prazo permitir |
| Não agora | Autenticação nova, exportação avançada e outras métricas além do I06 | Fora do escopo imediato |

## 6. Riscos e respostas

| Risco | Probabilidade | Impacto | Resposta |
|---|---|---|---|
| Credenciais, SSL, host ou rede impedem conexão | Média | Alto | Conferir host/porta/DB/schema/SSL do roteiro, não alterar permissões e avisar o professor em 04/11 se continuar falhando |
| SQL usa coluna/tabela diferente do schema real | Média | Alto | Conferir metadados sem trazer dados pessoais; ajustar a consulta e reexecutar em modo somente leitura. Validada em 03/11/2026 no schema `public`. |
| Consulta retorna vazio | Média | Médio | Validar status e intervalo de dados; exibir mensagem “sem dados para os filtros” sem inventar linhas |
| Empate nas posições finais do top 10 | Média | Baixo | Ordenar desempate por críticos e razão social; manter `LIMIT 10` conforme especificação |
| Integrante ausente ou atraso | Média | Médio | Apoio assume tarefa com atualização do responsável e registrar a mudança no plano |
| `.env` ou credencial vai para Git | Baixa | Alto | Conferir `.gitignore`, revisar `git status` e diff antes de commit; nunca publicar segredo |

## 7. Definição de pronto e controle de versão

O I06 está pronto quando:

- a conexão aponta para PostgreSQL SaúdeTech e o usuário está em modo somente leitura;
- a consulta retorna as quatro colunas esperadas, na ordem indicada, e roda no DBeaver sem erro;
- o resultado vazio é tratado de forma clara e o ranking está ordenado;
- o cartão aparece no Dashboard com título, pergunta e barras horizontais;
- a interface foi conferida em tema claro e escuro;
- erros da consulta não derrubam a página;
- `.env` e credenciais não aparecem no GitHub;
- commits seguem Conventional Commits, a tag `v1.1.0` está publicada e o Pull Request está aberto.

- **Branch:** `feature/dashboard-I06`
**Commits previstos:** `feat(dashboard): adiciona consulta do indicador I06`; `feat(dashboard): configura cartão e gráfico I06`; `docs(readme): descreve o indicador I06`.
**Tag planejada:** `v1.1.0` — Dashboard com indicador I06.

## 8. Critérios de avaliação do plano

| Critério | Peso | Evidência neste plano |
|---|---:|---|
| EAP simplificada | 20% | Cinco pacotes, tarefas, donos e entregas |
| Cronograma das Sprints | 20% | Três ciclos com datas, metas e entregas |
| Responsabilidades | 20% | Responsável único, apoio e tarefa de código por integrante |
| Prioridades | 15% | MoSCoW ligado ao escopo I06 |
| Riscos e definição de pronto | 15% | Riscos de banco/SQL/Git e critérios verificáveis |
| Clareza e apresentação | 10% | Indicador, pergunta, gráfico e repositório identificados |

## Consulta I06 associada ao plano

O arquivo [`grupo_I06_consulta.sql`](grupo_I06_consulta.sql) acompanha este plano. A consulta usa somente `SELECT`, foi validada em 03/11/2026 no DBeaver contra o banco `saudetech`, schema `public`, com SSL `require` e conexão configurada como somente leitura. Retornou 10 linhas e as quatro colunas esperadas.

## 7.1 Validação da conexão e da consulta no DBeaver

- **Data/hora:** 03/11/2026, aproximadamente 15:12 (horário de Brasília).
- **Conexão:** PostgreSQL no Render, banco `saudetech`, schema `public`, SSL `require`.
- **Proteção de escrita:** conexão marcada como somente leitura no DBeaver.
- **Consulta:** ranking I06 executado sem erro, com as colunas `razao_social`, `bairro`, `nao_conformidades` e `criticas`.
- **Resultado:** 10 linhas retornadas, conforme o limite do indicador. O relatório registra apenas a contagem, sem reproduzir nomes de estabelecimentos.
- **Observação:** os dados do protótipo navegável continuam ilustrativos; o SQL real validado é o arquivo `grupo_I06_consulta.sql`.
