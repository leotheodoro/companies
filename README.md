# Painel administrativo para cadastrar empresas e funcionários

## Passos para executar o projeto
Execute a api do upload, entre na pasta ```upload``` e digite o seguinte comando:

```
php -S ${IP_DA_SUA_MAQUINA}:2222
```

Obs: A porta padrão é ```2222``` mas pode mudar para uma de sua escolha.
Obs: É de extrema importância que seja o ipv4 da sua máquina, para que a api do Laravel consiga acessar. Para obter o ip da sua máquina, digite ```ipconfig``` e copie o endereço ipv4.

Segundo, você precisará configurar as variáveis de ambiente do projeto, no arquivo ```.env``` do Laravel, coloque as seguintes variáveis:

```
UPLOAD_URL=http://${URL_UPLOAD}/upload.php
DB_HOST=db
DB_PORT=3306
DB_DATABASE=panel
DB_USERNAME=root
DB_PASSWORD=sqladmin
```

Obs: A ```URL_UPLOAD``` é o ```ip``` da sua máquina seguido da porta que foi setada na execução da api de upload. No caso seria: ```${IP_DA_SUA_MAQUINA}:2222```.
Obs: As variáveis do BD devem ser as mesmas que foram configuradas no arquivo ```docker-compose.yml```.


Segundo, você precisará executar o docker na pasta ```panel```.

```
docker-compose up -d
```

Logo após o docker ser executado, você precisará subir as ```migrations```. Para subir as migrations, é simples, digite no terminal:

```
docker exec -it app /bin/sh
php artisan migrate --seed
```

Após todos os passos serem executados, acesse ```localhost``` e o sistema deve aparecer normalmente.

Usuário e senha para acesso admin é:
```
admin@admin.com
admin
```