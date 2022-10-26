# Laravel Api RESTful

## Introdução

Para iniciar a aplicação execute os seguintes comandos.

```
cd laradock 
docker-compose up -d nginx mysql phpmyadmin
docker-compose exec workspace bash 

```

Para criar o banco de dados e popular com registros para testes

```
php artisan migrate --seed
yes 

```
Após finalizar o processo de configuração é possível acessar http://localhost
Se for necessário é possível acessar o phpmyadmin http://localhost:8081

Para realizar requisições de teste via Postman importe as coleções que estão na pasta

```
./postman

```
## Model
https://github.com/wevertoncamposdev/apiprojectbywevertoncampos/blob/main/public/Model.svg

## Descrição do desenvolvimento
### Introdução e Observações Gerais

De acordo com as funções definidas foi possível identificar que se trata de um sistema de campanhas de descontos para cada produto registrado na campanha que serão destinados a grupos de cidades.

Neste modelo de negócio foi identificado a necessidade de criar pelo menos quatro tabelas **cities, products, groups, campaigns** e uma tabela pivot **campaign_product** já que existe a possibilidade de registrar vários produtos em várias campanhas.

A relação de **groups** e **cities** foi realizado no modelo 1:N, visto que cada cidade possui somente um grupo. Porém dependendo do modelo de negócio onde haja a necessidade de manter a rastreabilidade dos registros, este modelo utilizado não é o ideal.

A relação de **groups** e **campaign** foi realizado no modelo 1:N, visto que cada grupo possui somente uma campanha ativa. Aqui neste modelo percebemos também que não há rastreabilidade dos registros uma vez que alterada a campanha na tabela groups perdemos o registro da campanha anterior, é possível resolver isto gerando um pivot contendo uma coluna informando qual campanha está ativa, ou registrando datas de início e fim da campanha, onde a campanha mais próxima da data atual é a campanha ativa.

A relação de **campaign** e **products** foi realizado no modelo N:N  com uma tabela pivot onde recebe o valor de desconto de cada produto pertencente a campanha, nesse modelo é possível atualizar os descontos sem alterar o valor do produto e cada produto tem seu desconto independente.

De forma prática para manter a rastreabilidade dos dados foi utilizado o método softDeletes
Para verificar os registros arquivados acesse a rota http://localhost/api/trash?table=cities passando a tabela como parametro.

```
O softDeletesTz este método adiciona uma deleted_at TIMESTAMP coluna equivalente anulável (com fuso horário) com uma precisão opcional (total de dígitos). Esta coluna destina-se a armazenar o deleted_attimestamp necessário para a funcionalidade de "exclusão reversível" do Eloquent:
```
font: https://laravel.com/docs/9.x/migrations#column-method-softDeletesTz






### route http://localhost/api/cities

Criar/Listar/Editar/Excluir uma nova cidade
#### Visão Geral
Ao criar uma cidade ela recebe um uuid que será um parâmetro para criar os grupos de cidade ou para listar, atualizar e excluir uma cidade.
```
  GET|HEAD        api/cities ............................................................................. cities.index › Api\CitieController@index  
  POST            api/cities ............................................................................. cities.store › Api\CitieController@store  
  GET|HEAD        api/cities/{city} ........................................................................ cities.show › Api\CitieController@show  
  PUT|PATCH       api/cities/{city} .................................................................... cities.update › Api\CitieController@update
  DELETE          api/cities/{city} .................................................................. cities.destroy › Api\CitieController@destroy 

  Exemplo de rota com uuid:
  http://localhost/api/cities/8379fb45-d3da-4145-a38e-15badae5541a

```




### Autor <br>
<img src="https://github.com/wevertoncamposdev.png" width=115><br><sub>Weverton Campos</sub>
