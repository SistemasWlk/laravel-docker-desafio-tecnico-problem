<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Requisitos

- Git
- Docker
- Docker-composer

## Instalação

- Realizar o clone

```
root@577187a1bdd4# git clone https://github.com/SistemasWlk/laravel-docker-desafio-tecnico.git 
```


- Entra na pasta raiz do projeto e executar o seguinte comando

```
root@577187a1bdd4# docker-compose up -d --build
```

- Logo em seguida no direóro raiz do projeto execute o compser install

```
root@577187a1bdd4# chmod 777 storage/ -R
```

- Verifique se os conteines subiram

```
root@577187a1bdd4# docker ps

CONTAINER ID   IMAGE                                                                           COMMAND                  CREATED         STATUS         PORTS                                            NAMES
1fd8cb9127c1   phpmyadmin/phpmyadmin:latest                                                    "/docker-entrypoint.…"   4 minutes ago   Up 4 minutes   0.0.0.0:8001->80/tcp, :::8001->80/tcp            laravel-docker-desafio-tecnico-problem_phpmyadmin-app-laravel-docker-desafio-tecnico_1
050d5e64e543   laravel-docker-desafio-tecnico-problem_web-app-laravel-docker-desafio-tecnico   "/bin/bash /run.sh"      4 minutes ago   Up 4 minutes   443/tcp, 0.0.0.0:8000->80/tcp, :::8000->80/tcp   laravel-docker-desafio-tecnico-problem_web-app-laravel-docker-desafio-tecnico_1
227d535dc0b4   migs/mysql-5.7:latest                                                           "docker-entrypoint.s…"   4 minutes ago   Up 4 minutes   0.0.0.0:3306->3306/tcp, :::3306->3306/tcp        laravel-docker-desafio-tecnico-problem_mysql-laravel-docker-desafio-tecnico_1

```

- Acesse o da aplicação

```
root@577187a1bdd4# docker exec -it 050d5e64e543 bash
```

- Execute os comando logo abaixo na pasta raiz dentro do conteiner

```
root@577187a1bdd4# php artisan key:generate
root@577187a1bdd4# php artisan config:clear
root@577187a1bdd4# php artisan config:cache
```

## Endereço de Acesso

Acessa um navegador e digita as seguintes url
- http://localhost:8001/: phpMyAdmin 
- http://localhost:8000/: Desafio Técnico 

## Aceesso ao Banco

- DB_CONNECTION=mysql
- DB_HOST=mysql-laravel-docker-desafio-tecnico
- DB_PORT=3306
- DB_DATABASE=desafiotecnicofacilitaapp
- DB_USERNAME=root
- DB_PASSWORD=laravel


