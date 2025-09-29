-- 1. Consulta de Vendedores: Escreva uma query para listar todos os vendedores ativos, mostrando as colunas id, nome, salario. Ordene o resultado pelo nome em ordem ascendente.
SELECT id_vendedor, nome, salario FROM VENDEDORES WHERE INATIVO = 'F' ORDER BY nome ASC

-- 2.Escreva uma query para listar os funcionários que possuem um salário acima da média salarial de todos os funcionários. A consulta deve mostrar as colunas id, nome, e salário, ordenadas pelo salário em ordem descendente.
WITH media AS (
  select avg(salario) as media_salarial from VENDEDORES
)
select id_vendedor, nome, salario from VENDEDORES, media
where salario > media.media_salarial order by salario desc

-- 3.  Escreva uma query para listar todos os clientes e o valor total de pedidos já transmitidos. A consulta deve retornar as colunas id, razao_social, total, ordenadas pelo total em ordem descendente.
SELECT 
    c.id_cliente, 
    c.razao_social, 
    COALESCE(SUM(p.valor_total), 0) AS total
FROM clientes c LEFT JOIN pedido p ON c.id_cliente = p.id_cliente
GROUP BY c.id_cliente, c.razao_social
ORDER BY total DESC;

-- 4. Escreva uma query que retorne a situação atual de cada pedido da base. A consulta deve retornar as colunas id, valor, data e situacao. A situacao deve obedecer a seguinte regra:
SELECT 
  id_pedido, 
  valor_total,
  data_emissao, 
  (CASE WHEN data_cancelamento is not null then 'CANCELADO'
        WHEN data_faturamento  is not null then 'FATURADO'
        ELSE 'PENDENTE'
  END) as status
from pedido

-- 5. Escreva uma query que retorne o produto mais vendido ( em quantidade ), incluindo o valor total vendido deste produto, quantidade de pedidos em que ele apareceu e para quantos clientes diferentes ele foi vendido. A consulta deve retornar as colunas id_produto, quantidade_vendida, total_vendido, clientes, pedidos. Caso haja empate em quantidade de vendas, utilizar o total vendido como critério de desempate.
SELECT 
  ip.id_produto,            
  SUM(ip.quantidade)                       as quantidade_vendida,
  SUM(ip.quantidade * ip.preco_praticado)  as total_vendido,
  COUNT(DISTINCT(ip.id_pedido))            as pedidos,
  COUNT(DISTINCT(p.id_cliente))            as clientes
from PEDIDO p JOIN ITENS_PEDIDO ip on p.id_pedido = ip.id_pedido 
group by ip.id_produto
ORDER BY total_vendido DESC
LIMIT 1;