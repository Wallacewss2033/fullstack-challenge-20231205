# Fullstack Challenge - Onfly 20231205

## Projeto de despesas TESTE

Este projeto é um aplicativo CRUD (Create, Read, Update, Delete) de despesas, desenvolvido para ajudar a gerenciar suas finanças de maneira eficiente. Com este aplicativo, você pode adicionar, visualizar, editar e excluir despesas facilmente, proporcionando uma maneira organizada de rastrear seus gastos.

## Tecnologias Usadas

- Laravel
- Vue.js
- Bootstrap
- Vue Router
- Redis
- Horizon (gerenciador de filas)


## Instalação 

### Obs: 
- é necessário um servidor redis para rodar as filas.

- Atenção para as configurações de Mail, é necessário configurar as variáveis de ambiente na ```.env```. Esse projeto contém envio de email.

- Clone o projeto
```
git clone git@github.com:Wallacewss2033/fullstack-challenge-20231205.git
```

### Back-end

- Entre na pasta onfly-api e instale as dependencias
```
composer install
```
- logo após rode esses comandos
```
cp .env.example .env
```
```
php artisan key:generate
``` 

- Não esqueça de configurar o banco de dados na ``` .env ```
  
![image](https://github.com/Wallacewss2033/fullstack-challenge-20231205/assets/39920409/ec726dce-7762-4c68-b66c-668698afad41)


- Para criar o banco de dados
```
php artisan migrate
```

- Para popular o banco na tabela de usuário
```
php artisan db:seed
```

- Para rodar o projeto
```
php artisan serve
```

### front-end

- Entre na pasta onfly-web e instale as dependencias
  
```
npm install
```
- Para rodar o projeto
  
```
vue serve
```


