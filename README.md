ZF2 OpenStore
=======================

Introdução
------------
Projeto para estudo do Grupo Zenders
https://github.com/Zenders-BR/ZF2OpenStore

Instalação
------------
* Clone o projeto para o ditório do seu servidor local
* Utilize o composer para baixar as dependencias do zf2, `Neste passo siga o trecho abaixo "Usando o composer(recomendado)"`
* Suba o modelo de dados que está em `docs\database.sql`
* Crie um `virtual host` apontando para o diretório `public` do seu projeto
* acesse o projeto via browser.


Usando o Composer (recomendado)
----------------------------

The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev --repository-url="http://packages.zendframework.com" zendframework/skeleton-application path/to/install

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd /var/www/
    git clone https://github.com/Zenders-BR/ZF2OpenStore.git zf2openstore
    cd zf2openstore
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Virtual Host
------------
Afterwards, set up a virtual host to point to the public/ directory of the
project and you should be ready to go!
