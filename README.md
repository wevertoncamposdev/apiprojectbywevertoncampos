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








Route List

```
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

```