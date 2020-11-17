# fortics-fullstack
Teste fullstack developer

## Requisitos:
- Docker
- Composer
- Node & NPM

## Inicialização
> Navegue ate a pasta /server e execute `composer install`
<br/>
> Navegue até a pasta /web e execute `npm install`
<br/>
> Vá para raiz do projeto e execute o docker file com `docker-compose up`
<br/>
> Após os containers terem iniciado execute o console do container `api` e execute o seguinte comando : `php artisan migrate --seed`

## Acesso
> `API` : http://localhost:1234 <br/>
> `WEB` : http://localhost:8000

## Funções

- Cadastro de refrigerantes
- Edição de cadastros
- Exclusão de refrigerantes em massa
- Paginação de listagem 

## API Routes
> [GET] `http://localhost:1234/api/soda` - Lista dados <br/>
> [POST] `http://localhost:1234/api/soda` - Registra <br/>
> [PUT] `http://localhost:1234/api/soda/{id}` - Atualiza refri <br />
> [POST] `http://localhost:1234/api/soda/delete` - Deleta registro, recebe parametros `_method` = `DELETE` é recebe array de ids de refris, `items` = `[0..N]` <br />
> [GET] `http://localhost:1234/api/type` - Lista tipos <br/>
> [GET] `http://localhost:1234/api/brand` - Lista marcas <br />
> [GET] `http://localhost:1234/api/litigation` - Lista litragens
