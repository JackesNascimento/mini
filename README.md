![MINI - A naked barebone PHP application](_install/mini-logo.png)

# MINI

O MINI é um aplicativo PHP de esqueleto extremamente simples e fácil de entender, reduzido ao máximo.
MINI não é uma estrutura profissional e não vem com todas as coisas que os frameworks reais têm.
Se você quiser apenas mostrar algumas páginas, faça algumas chamadas de banco de dados e um pouco de AJAX aqui e ali, sem
lendo em documentações maciças de estruturas profissionais altamente complexas, então o MINI pode ser muito útil para você.
MINI é fácil de instalar, corre quase que em todos os lugares e não torna as coisas mais complicadas do que o necessário.

Para uma introdução mais profunda ao MINI, dê uma olhada nesta publicação no blog:
[MINI, an extremely simple barebone PHP application](http://www.dev-metal.com/mini-extremely-simple-barebone-php-application/).

## Características:

- extremamente simples, fácil de entender
- estrutura simples mas limpa
- faz "lindos" URLs limpos
- ações de demo CRUD: criar, ler, atualizar e excluir entradas de banco de dados facilmente
- chamada de demonstração AJAX
- tenta seguir as diretrizes de codificação PSR 1/2
- usa PDO para qualquer solicitação de banco de dados, vem com uma ferramenta de depuração PDO adicional para emular suas instruções SQL
- código comentado
- usa apenas código PHP nativo, para que as pessoas não tenham que aprender uma estrutura

## Apoie o projeto:

[![Support](https://supporterhq.com/api/b/9guz00i6rep05k1mwxyquz30k)](https://supporterhq.com/give/9guz00i6rep05k1mwxyquz30k)

## Forks do MINI

### TINY
 
MINI tem um irmão menor, chamado [TINY](https://github.com/panique/tiny). É semelhante ao MINI, mas funciona sem
mod_rewrite em quase todos os ambientes. Não é adequado para sites ao vivo, mas sim para prototipagem rápida.
 
### MINI2 
 
MINI também tem um irmão maior, chamado [MINI2](https://github.com/panique/mini2). É ainda mais simples, foi construído
usando Slim e tem recursos agradáveis ​​como SASS-compilação, Twig etc.

### MINI3
 
[MINI3](https://github.com/panique/mini3) É o sucessor do MINI,
usando a estrutura original do aplicativo MINI1 nativo (sem Slim), mas com autoloading apropriado PSR-4, modelo múltiplo
e namespaces reais.

## Requerimentos

- PHP 5.3.0+ (quando lançado pela primeira vez), agora funciona bem com versões estáveis ​​do atual PHP 5.6 e 7.0
- MySQL
- mod_rewrite ativado (tutoriais abaixo, mas também há [TINY](https://github.com/panique/tiny), um mod_rewrite-less
versão do MINI)

## Instalação (em Vagrant, 100% automático)

Se você estiver usando o Vagrant para o seu desenvolvimento, você pode instalar o MINI com um clique (ou um comando no
linha de comando) [[Vagrant doc] (https://docs.vagrantup.com/v2/getting-started/provisioning.html)]. MINI vem com uma demo
Vagrant-file (define sua caixa Vagrant) e um demo bootstrap.sh que instala automaticamente o Apache, PHP, MySQL,
PHPMyAdmin, git e Composer, define uma senha escolhida no MySQL e PHPMyadmin e até dentro do código do aplicativo,
baixa as dependências Composer, ativa mod_rewrite e edita as configurações do Apache, baixa o código do GitHub
e executa as instruções SQL de demonstração (para dados de demonstração). Isso é 100% automático, você acabará após +/- 5 minutos com um total
executando a instalação do MINI2 dentro de uma caixa Ubuntu 14.04 LTS Vagrant.

Para fazer isso, coloque 'Vagrantfile' e 'bootstrap.sh' de '_vagrant' dentro de uma pasta (e nada mais).
Faça 'Box Vagrant adicione ubuntu / trusty64' para adicionar o Ubuntu 14.04 LTS ("Trusty Thar") 64bit a Vagrant (a menos que você já tenha), então, faça "Vagrant up" para executar a caixa. Quando a instalação estiver concluída, você pode usar diretamente a demonstração totalmente instalada aplicativo no '192.168.33.44'. Como este apenas um ambiente de demonstração rápida, a senha de root do MySQL e a senha de root do PHPMyAdmin estão configurados para '12345678', o projeto está instalado em '/var/www/html/myproject'. Você pode mudar isso com certeza dentro 'bootstrap.sh'.

## Auto-instalação em Ubuntu 14.04 LTS (em 30 segundos)


Você pode instalar o MINI, incluindo Apache, MySQL, PHP e PHPMyAdmin, mod_rewrite, Composer, todas as configurações necessárias e até mesmo as senhas dentro do arquivo configs simplesmente baixando um arquivo e executando-o, toda a instalação executará 100% automaticamente. Encontre o tutorial neste artigo do blog:
[Install MINI in 30 seconds inside Ubuntu 14.04 LTS](http://www.dev-metal.com/install-mini-30-seconds-inside-ubuntu-14-04-lts/)

## Instalação

1. Edite as credenciais do banco de dados em 'application / config / config.php'
2. Execute as instruções .sql na pasta '_install/' (com PHPMyAdmin, por exemplo).
3. Certifique-se de ter mod_rewrite ativado no seu servidor/em seu ambiente. Algumas diretrizes:
   [Ubuntu 14.04 LTS](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-14-04-lts/),
   [Ubuntu 12.04 LTS](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-12-04-lts/),
   [EasyPHP on Windows](http://stackoverflow.com/questions/8158770/easyphp-and-htaccess),
   [AMPPS on Windows/Mac OS](http://www.softaculous.com/board/index.php?tid=3634&title=AMPPS_rewrite_enable/disable_option%3F_please%3F),
   [XAMPP for Windows](http://www.leonardaustin.com/blog/technical/enable-mod_rewrite-in-xampp/),
   [MAMP on Mac OS](http://stackoverflow.com/questions/7670561/how-to-get-htaccess-to-work-on-mamp)

O MINI é executado sem qualquer configuração adicional. Você também pode colocá-lo dentro de uma sub-pasta, ele funcionará sem qualquer configuração adicional.
Talvez seja útil: um tutorial simples sobre[How to install LAMPP (Linux, Apache, MySQL, PHP, PHPMyAdmin) on Ubuntu 14.04 LTS](http://www.dev-metal.com/installsetup-basic-lamp-stack-linux-apache-mysql-php-ubuntu-14-04-lts/)
e [the same for Ubuntu 12.04 LTS](http://www.dev-metal.com/setup-basic-lamp-stack-linux-apache-mysql-php-ubuntu-12-04/).

## Configurações do servidor para:

### nginx

```nginx
server {
    server_name default_server _;   # Listen to any servername
    listen      [::]:80;
    listen      80;

    root /var/www/html/myproject/public;

    location / {
        index index.php;
        try_files /$uri /$uri/ /index.php?url=$uri;
    }

    location ~ \.(php)$ {
        fastcgi_pass   unix:/var/run/php5-fpm.sock;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

Uma discussão mais profunda sobre as configurações do nginx pode ser encontrada [AQUI](https://github.com/panique/mini/issues/55).

## Segurança

O script faz uso do mod_rewrite e bloqueia todo o acesso a tudo fora da pasta/public. Sua pasta/arquivos.git, arquivos temporários do sistema operacional, a pasta de aplicativos e tudo mais não está acessível (quando configurado corretamente). Para os pedidos de banco de dados, DOP é usado, portanto, não é necessário pensar sobre a injeção SQL (a menos que você estão usando versões MySQL extremamente desatualizadas).

## Goodies

MINI comes with a little customized [PDO debugger tool](https://github.com/panique/pdo-debug) (find the code in
application/libs/helper.php), trying to emulate your PDO-SQL statements. It's extremely easy to use:

```php
$sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
$query = $this->db->prepare($sql);
$parameters = array(':song_id' => $song_id);

echo Helper::debugPDO($sql, $parameters);

$query->execute($parameters);
```

## Why has the "Error" class been renamed to "Problem"?

The project was written in PHP5 times, but with the release of PHP7 it's not possible anymore to name a class
"Error" as PHP itself has a internal Error class now. Renaming was the most simple solution, compared to other
options like "ErrorController" etc. which would add new problems like uppercase filenames etc. (which will not
work properly on some setups). 

## License

This project is licensed under the MIT License.
This means you can use and modify it for free in private or commercial projects.

## My blog

And by the way, I'm also blogging at [Dev Metal](http://www.dev-metal.com).

## Quick-Start

#### The structure in general

The application's URL-path translates directly to the controllers (=files) and their methods inside 
application/controllers. 

`example.com/home/exampleOne` will do what the *exampleOne()* method in application/controllers/home.php says.

`example.com/home` will do what the *index()* method in application/controllers/home.php says.

`example.com` will do what the *index()* method in application/controllers/home.php says (default fallback).

`example.com/songs` will do what the *index()* method in application/controllers/songs.php says.

`example.com/songs/editsong/17` will do what the *editsong()* method in application/controllers/songs.php says and
will pass `17` as a parameter to it.

Self-explaining, right ?

#### Showing a view

Let's look at the exampleOne()-method in the home-controller (application/controllers/home.php): This simply shows
the header, footer and the example_one.php page (in views/home/). By intention as simple and native as possible.

```php
public function exampleOne()
{
    // load view
    require APP . 'views/_templates/header.php';
    require APP . 'views/home/example_one.php';
    require APP . 'views/_templates/footer.php';
}
```  

#### Working with data

Let's look into the index()-method in the songs-controller (application/controllers/songs.php): Similar to exampleOne,
but here we also request data. Again, everything is extremely reduced and simple: $this->model->getAllSongs() simply
calls the getAllSongs()-method in application/model/model.php.

```php
public function index()
{
    // getting all songs and amount of songs
    $songs = $this->model->getAllSongs();
    $amount_of_songs = $this->model->getAmountOfSongs();

   // load view. within the view files we can echo out $songs and $amount_of_songs easily
    require APP . 'views/_templates/header.php';
    require APP . 'views/songs/index.php';
    require APP . 'views/_templates/footer.php';
}
```

For extreme simplicity, all data-handling methods are in application/model/model.php. This is for sure not really
professional, but the most simple implementation. Have a look how getAllSongs() in model.php looks like: Pure and
super-simple PDO.

```php
public function getAllSongs()
{
    $sql = "SELECT id, artist, track, link FROM song";
    $query = $this->db->prepare($sql);
    $query->execute();
    
    return $query->fetchAll();
}
```

The result, here $songs, can then easily be used directly
inside the view files (in this case application/views/songs/index.php, in a simplified example):

```php
<tbody>
<?php foreach ($songs as $song) { ?>
    <tr>
        <td><?php if (isset($song->artist)) echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php if (isset($song->track)) echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
<?php } ?>
</tbody>
```

## History

MINI is the successor of php-mvc. As php-mvc didn't provide a real MVC structure (and several people complained
about that - which is totally right!) I've renamed and rebuild the project.

## Dear haters, trolls and everything-sucks-people...

... MINI is just a simple helper-tool I've created for my daily work, simply because it was much easier to setup and to
handle than real frameworks. For daily agency work, quick prototyping and frontend-driven projects it's totally okay,
does the job and there's absolutely no reason to discuss why it's "shit compared to Laravel", why it does not follow 
several MVC principles or why there's no personal unpaid support or no russian translation or similar weird stuff. 
The trolling against Open-Source-projects (and their authors) has really reached insane dimensions.

I've written this unpaid, voluntarily, in my free-time and uploaded it on GitHub to share.
It's totally free, for private and commercial use. If you don't like it, don't use it.
If you see issues, then please write a ticket (and if you are really cool: I'm very thankful for any commits!).
But don't bash, don't complain, don't hate. Only bad people do so.

## Contribute

Please commit into the develop branch (which holds the in-development version), not into master branch
(which holds the tested and stable version).

## Changelog

**August 2016**
- [codebicycle/panique] renamed Error class to Problem to make it PHP7 compatible #209
- [ynohtna92/panique] URL protocol is now protocol-independent #208

**February 2015**
- [jeroenseegers] nginx setup configuration

**December 2014**
- [panique] css fixes
- [panique] renamed controller / view to singular
- [panique] added charset to PDO creation (increased security) 

**November 2014**
- [panique] auto-install script for Vagrant
- [panique] basic documentation
- [panique] PDO-debugger is now a static helper-method, not a global function anymore
- [panique] folder renaming
- [reg4in] JS AJAX calls runs now properly even when using script in sub-folder
- [panique] removed all "models", using one model file now
- [panique] full project renaming, re-branding

**October 2014**
- [tarcnux/panique] PDO debugging
- [panique] demo ajax call
- [panique] better output escaping
- [panique] renamed /libs to /core
- [tarcnux] basic CRUD (create/read/update/delete) examples have now an U (update)
- [panique] URL is now config-free, application detects URL and sub-folder
- [elysdir] htaccess has some good explanation-comments now
- [bst27] fallback for non-existing controller / method
- [panique] fallback will show error-page now
- [digitaltoast] URL split fix to make php-mvc work flawlessly on nginx
- [AD7six] security improvement: moved index.php to /public, route ALL request to /public

**September 2014**
- [panique] added link to support forum
- [panique] added link to Facebook page

**August 2014**
- [panique] several changes in the README, donate-button changes

**June 2014**
- [digitaltoast] removed X-UA-Compatible meta tag from header (as it's not needed anymore these days)
- [digitaltoast] removed protocol in jQuery URL (modern way to load external files, making it independent to protocol change)
- [digitaltoast] downgraded jQuery from 2.1 to 1.11 to avoid problems when working with IE7/8 (jQuery 2 dropped IE7/8 support)
- [panique] moved jQuery loading to footer (to avoid page render blocking)

**April 2014**
- [panique] updated jQuery link to 2.1
- [panique] more than 3 parameters (arguments to be concrete) are possible
- [panique] cleaner way of parameter handling
- [panique] smaller cleanings and improvements
- [panique] Apache 2.4 install information

**January 2014**
- [panique] fixed .htaccess issue when there's a controller named "index" and a base index.php (which collide)

## Support the project

Rent your next server at [1&1](http://www.anrdoezrs.net/click-8225479-12015878-1477926464000) to support this open-source project.
