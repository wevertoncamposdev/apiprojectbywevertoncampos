# Laravel Api RESTful

## Desenvolvimento

Para o desenvolvimento foi utilizado **Laravel 9**.

Para o ambiente de desenvolvimento foi utilizado o **Laradock** definindo as versões mais atuais do **PHP** e **MySQL**.


## Iniciando a aplicação

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
Após finalizar o processo de configuração é possível acessar http://localhost .

Se for necessário é possível acessar o phpmyadmin http://localhost:8081

Para realizar requisições de teste via **Postman** importe as coleções que estão na pasta

```
./postman

```
## Model
https://github.com/wevertoncamposdev/apiprojectbywevertoncampos/blob/main/public/Model.svg


### Observações Gerais

Pensando em **sergurança** foi utilizado o método **UUID** que gera um identificador único para o registro evitando passar o **ID** no frontend.

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




## Route http://localhost/api/cities

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

## Route http://localhost/api/products

Criar/Listar/Editar/Excluir um produto
#### Visão Geral
Ao criar um produto ele recebe um uuid que servirá de parâmetro para criar as campanhas de descontos.
Ao criar uma campanha é necessário enviar o uuid do produto e os descontos de cada produto.


```
  GET|HEAD        api/products ....................................................................... products.index › Api\ProductController@index  
  POST            api/products ....................................................................... products.store › Api\ProductController@store  
  GET|HEAD        api/products/{product} ............................................................... products.show › Api\ProductController@show  
  PUT|PATCH       api/products/{product} ........................................................... products.update › Api\ProductController@update  
  DELETE          api/products/{product} ......................................................... products.destroy › Api\ProductController@destroy  

  Exemplo de rota com uuid:
  http://localhost/api/products/8379fb45-d3da-4145-a38e-15badae5541a

```

## Route http://localhost/api/campaigns

Criar/Listar/Editar/Excluir uma nova campanha

#### Visão Geral
Ao criar uma campanha é possível adicionar os produtos com seus respectivos descontos. Ao atualizar uma campanha é possível atualizar os produtos existentes ou adicionar mais produtos . Para remover o produto da campanha acesse a rota de produto

```
  GET|HEAD        api/campaigns .................................................................... campaigns.index › Api\CampaignController@index  
  POST            api/campaigns .................................................................... campaigns.store › Api\CampaignController@store  
  GET|HEAD        api/campaigns/{campaign} ........................................................... campaigns.show › Api\CampaignController@show  
  PUT|PATCH       api/campaigns/{campaign} ....................................................... campaigns.update › Api\CampaignController@update  
  DELETE          api/campaigns/{campaign} ..................................................... campaigns.destroy › Api\CampaignController@destroy  
  Exemplo de rota com uuid:
  http://localhost/api/campaigns/8379fb45-d3da-4145-a38e-15badae5541a

```

## Route http://localhost/api/groups

Criar/Listar/Editar/Excluir um novo grupo de cidades

#### Visão Geral
Ao criar um grupo de cidades é possível inserir uma campanha e as cidades pertencentes a este grupo.
A campanha já retorna os dados de produtos e descontos registrados na campanha.
Esta rota retorna todos os dados de cada groupo, informando as cidades que pertencem a este grupo, a campanha ativa e os produtos e descontos desta campanha.


```
  GET|HEAD        api/groups ............................................................................. groups.index › Api\GroupController@index  
  POST            api/groups ............................................................................. groups.store › Api\GroupController@store  
  GET|HEAD        api/groups/{group} ....................................................................... groups.show › Api\GroupController@show  
  PUT|PATCH       api/groups/{group} ................................................................... groups.update › Api\GroupController@update  
  DELETE          api/groups/{group} ................................................................. groups.destroy › Api\GroupController@destroy 

  Exemplo de rota com uuid:
  http://localhost/api/groups/8379fb45-d3da-4145-a38e-15badae5541a

```

## Route http://localhost/api/trash

Criar/Listar/Editar/Excluir uma nova cidade
#### Visão Geral
Ao criar uma cidade ela recebe um uuid que será um parâmetro para criar os grupos de cidade ou para listar, atualizar e excluir uma cidade.
```
  GET|HEAD        api/trash ............................................................................... trash.index › Api\TrashController@index  
  GET|HEAD        api/trash/{trash} ......................................................................... trash.show › Api\TrashController@show
  GET|HEAD        api/trash/{trash} ......................................................................... trash.show › Api\TrashController@show  
  PUT|PATCH       api/trash/{trash} ..................................................................... trash.update › Api\TrashController@update  
  DELETE          api/trash/{trash} ................................................................... trash.destroy › Api\TrashController@destroy 

  Exemplo da rota com o parametro ?table:
  http://localhost/api/trash?table=cities

```




### Autor <br>
<img src="https://github.com/wevertoncamposdev.png" width=115><br><sub>Weverton Campos</sub>
