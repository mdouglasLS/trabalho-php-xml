# Fórum de Dev Web - Unopar

## Como rodar
- É preciso ter pelo menos o PHP instalado
- Clonar o projeto ou fazer o download
- Opção 1: executar no terminar `php -S localhost:8000` no mesmo diretório do projeto
- Opção 2: caso use o xamp para rodar o apache, pode mover a posta do projeto para dentro de `C:\xamp\htdocs`


## Requisitos da atividade:
- Criar um arquivo XML contendo os signos e estruturado da seguinte forma: 
  - Nome
  - Características
  - Data de inicio e final
  
- Desenvolver uma página web contendo um formulário onde o usuário poderá inserir sua data de nascimento e ao clicar no submit deve ser redirecionado para uma página que contém as informações principais do seu signo.

- Abrir o arquivo XML e iterar todos os elementos para buscar qual o signo do usuário usando sua data de aniversário.


## Página "home" que contém o formulário
- O index.php é onde fica o formulário para o usuário informar seus dados

- Após clicar em "Descobrir", o formulário faz o action para o arquivo logica.php

<img src="assets/index.png" alt="Página index" width="900"/>

## Página que mostra o signo do usuário

- No logica.php é onde acontece o processo para descobrir qual o signo do usuário

- Após todo o processo, no final é incluido o arquivo mostrar-signo.php 

<img src="assets/mostrar-signo.png" alt="Página index" width="900"/>