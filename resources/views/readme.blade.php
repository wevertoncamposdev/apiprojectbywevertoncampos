<div>
    <div class="preview__inner-2" style="padding: 10px 25px 276px;">
        <div class="cl-preview-section">
            <h1 id="laravel-rest">Laravel api RESTful</h1>
        </div>
        <div class="cl-preview-section">
            <h1 id="comandos-docker">Comandos Docker</h1>
        </div>
        <div class="cl-preview-section">
            <p>Acesse a pasta laradock e inicie o docker via <strong>docker-compose</strong></p>
        </div>
        <div class="cl-preview-section">
            <pre><code>cd laradock
docker-compose up -d nginx mysql phpmyadmin
</code></pre>
        </div>
        <div class="cl-preview-section">
            <h2 id="definições-do-teste">Definições do teste</h2>
        </div>
        <div class="cl-preview-section">
            <ol>
                <li>Linguagem de programação: PHP (Framework Laravel)</li>
                <li>Banco de dados: MySQL ou PostgreSQL</li>
                <li>Deverá ser criado um arquivo docker/compose onde será executado todo o teste</li>
                <li>Todo o código e instruções para a execução deverão estar disponível no GitHub</li>
            </ol>
        </div>
        <div class="cl-preview-section">
            <h2 id="itens-a-serem-criados">Itens a serem criados</h2>
        </div>
        <div class="cl-preview-section">
            <p>Montar uma api RESTful com laravel para alimentar uma SPA com as seguintes funções:</p>
        </div>
        <div class="cl-preview-section">
            <ol>
                <li>Cadastrar/Editar/Listar/Excluir cidades;</li>
                <li>Cadastrar/Editar/Listar/Excluir grupo de cidades;</li>
                <li>Cadastrar/Editar/Listar/Excluir campanhas para o grupo de cidades onde cada grupo possui somente uma
                    campanha ativa;</li>
                <li>Cadastrar/Editar/Listar/Excluir desconto para os produtos da campanha;</li>
                <li>Cadastrar/Editar/Listar/Excluir produtos;</li>
            </ol>
        </div>
        <div class="cl-preview-section">
            <p>As tabelas de relacionamento estão a cargo do candidato;<br>
                Cada cidade possui somente um grupo;</p>
        </div>
        <div class="cl-preview-section">
            <h2 id="exemplo">Modelagem</h2>
            <a href="model.pdf" target="_blanck">ver</a>
        </div>
        <div class="cl-preview-section">
            <h2 id="route-list">Route List</h2>
        </div>
        <div class="cl-preview-section">
            <pre><code>
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

</code></pre>
        </div>
        
        <div>
            
        </div>
    </div>
    <div class="gutter" style="left: 0px;">
        <!---->
        <!---->
    </div>
</div>
