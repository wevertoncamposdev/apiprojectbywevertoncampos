Laravel api RESTful
Comandos Docker
Acesse a pasta laradock e inicie o docker via docker-compose

cd laradock
docker-compose up -d nginx mysql phpmyadmin
docker-compose exec workspace bash 
php artisan migrate --seed
yes

Após finalizar o processo é possível acessar http://localhost
Se for necessário é possível acessar o phpmyadmin http://localhost:8081

As collections do Postamn contendo as rotas e os paramentros para testes estão na pasta public/postman

Definições do teste
Linguagem de programação: PHP (Framework Laravel)
Banco de dados: MySQL ou PostgreSQL
Deverá ser criado um arquivo docker/compose onde será executado todo o teste
Todo o código e instruções para a execução deverão estar disponível no GitHub
Itens a serem criados
Montar uma api RESTful com laravel para alimentar uma SPA com as seguintes funções:

Cadastrar/Editar/Listar/Excluir cidades;
Cadastrar/Editar/Listar/Excluir grupo de cidades;
Cadastrar/Editar/Listar/Excluir campanhas para o grupo de cidades onde cada grupo possui somente uma campanha ativa;
Cadastrar/Editar/Listar/Excluir desconto para os produtos da campanha;
Cadastrar/Editar/Listar/Excluir produtos;
As tabelas de relacionamento estão a cargo do candidato;
Cada cidade possui somente um grupo;

Modelagem
ver
Route List

  POST            _ignition/execute-solution .......................................................................................... ignition.executeSolution › Spatie\LaravelIgnition › ExecuteSolutionController  
  GET|HEAD        _ignition/health-check ...................................................................................................... ignition.healthCheck › Spatie\LaravelIgnition › HealthCheckController  
  POST            _ignition/update-config ................................................................................................... ignition.updateConfig › Spatie\LaravelIgnition › UpdateConfigController  
  GET|HEAD        api/campaigns ...................................................................................................................................... campaigns.index › Api\CampaignController@index  
  POST            api/campaigns ...................................................................................................................................... campaigns.store › Api\CampaignController@store  
  GET|HEAD        api/campaigns/{campaign} ............................................................................................................................. campaigns.show › Api\CampaignController@show  
  PUT|PATCH       api/campaigns/{campaign} ......................................................................................................................... campaigns.update › Api\CampaignController@update  
  DELETE          api/campaigns/{campaign} ....................................................................................................................... campaigns.destroy › Api\CampaignController@destroy  
  GET|HEAD        api/cities ............................................................................................................................................... cities.index › Api\CitieController@index  
  POST            api/cities ............................................................................................................................................... cities.store › Api\CitieController@store  
  GET|HEAD        api/cities/{city} .......................................................................................................................................... cities.show › Api\CitieController@show  
  PUT|PATCH       api/cities/{city} ...................................................................................................................................... cities.update › Api\CitieController@update  
  DELETE          api/cities/{city} .................................................................................................................................... cities.destroy › Api\CitieController@destroy  
  GET|HEAD        api/groups ............................................................................................................................................... groups.index › Api\GroupController@index  
  POST            api/groups ............................................................................................................................................... groups.store › Api\GroupController@store  
  GET|HEAD        api/groups/{group} ......................................................................................................................................... groups.show › Api\GroupController@show  
  PUT|PATCH       api/groups/{group} ..................................................................................................................................... groups.update › Api\GroupController@update  
  DELETE          api/groups/{group} ................................................................................................................................... groups.destroy › Api\GroupController@destroy  
  GET|HEAD        api/products ......................................................................................................................................... products.index › Api\ProductController@index  
  POST            api/products ......................................................................................................................................... products.store › Api\ProductController@store  
  GET|HEAD        api/products/{product} ................................................................................................................................. products.show › Api\ProductController@show  
  PUT|PATCH       api/products/{product} ............................................................................................................................. products.update › Api\ProductController@update  
  DELETE          api/products/{product} ........................................................................................................................... products.destroy › Api\ProductController@destroy  
  GET|HEAD        api/trash ................................................................................................................................................. trash.index › Api\TrashController@index  
  POST            api/trash ................................................................................................................................................. trash.store › Api\TrashController@store  
  GET|HEAD        api/trash/{trash} ........................................................................................................................................... trash.show › Api\TrashController@show  
  PUT|PATCH       api/trash/{trash} ....................................................................................................................................... trash.update › Api\TrashController@update  
  DELETE          api/trash/{trash} ..................................................................................................................................... trash.destroy › Api\TrashController@destroy  
  GET|HEAD        sanctum/csrf-cookie ............................................................................................................. sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieController@show  

  Introdução
Criar/Listar/Editar/Excluir uma nova cidade

Visão Geral
Ao criar uma cidade ela recebe um uuid que será uma parâmetro para criar os grupos de cidade.

NEXT IN THIS COLLECTION
GET
Show All Cities
GET
Show Only City
POST
Create City
PUT
Update City
DEL
Delete City