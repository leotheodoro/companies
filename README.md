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

## Perguntas 

**Se você fosse responsável por um dos datacenters do Google, e seu chefe lhe dissesse que sua unidade está consumindo muita energia elétrica. O que você faria? Justifique sua resposta.**
Procuraria soluções para evitar esse consumo excessivo, através de otimização de códigos e scripts, analisaria também a infraestrutura do servidor e verificaria se está havendo algum gargalo que possa ser resolvido. Procuraria formas inovadoras de automatizar os datacenters. Limitar no consumo de banda larga também seria uma opção.

**Qual característica de personalidade conflita com você?**
Tenho muita vontade de aprender muitas coisas, e isso gera um conflito que gera indecisão sobre o que estudar e as vezes me faz ficar estagnado, isso faz com que eu tenha um planejamento e uma clareza dos meus objetivos profissionais para que consiga focar no essencial.

**Como você lidaria com um colega que consistente evitar chamar para si mais trabalho?**
Tentaria entender o motivo dele fazer isso, depois tentaria formas indiretas para fazer com que ele fosse mais produtivo e conseguisse trabalhar de forma mais eficaz. Faria isso através de conversas e exemplos.

**Alguma vez você já motivou alguém a terminar uma tarefa? Como você fez?**
Sim, eu tive que mostrar com clareza o big picture da situação e como seria o final do projeto, isso fez com que ele ficasse motivado a terminar o projeto, porque já imaginava o resultado final.