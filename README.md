test-dev
========

Un stagiaire à créer le code contenu dans le fichier src/Controller/Home.php

Celui permet de récupérer des urls via un flux RSS ou un appel à l’API NewsApi. 
Celles ci sont filtrées (si contient une image) et dé doublonnées. 
Enfin, il faut récupérer une image sur chacune de ces pages.

Le lead dev n'est pas très satisfait du résultat, il va falloir améliorer le code.

Pratique : 
1. Revoir complètement la conception du code (découper le code afin de pouvoir ajouter de nouveaux flux simplement) 

Questions théoriques : 
1. Que mettriez-vous en place afin d'améliorer les temps de réponses du script
2. Comment aborderiez-vous le fait de rendre scalable le script (plusieurs milliers de sources et images)


# Usage

1. Clone repository, `cd` inside.
1. Create `.env` file in `docker/php` directory according to your environment, one of - `dev`, `test`, `prod` - just copy correct template `.env.dist`, but remember to define your own `APP_SECRET`!
1. Review `docker-compose.yml` and change according to the comments inside. 
1. You can change PHP memory limit in `docker/php/config/docker-php-memlimit.init` file if you want.

Afterwards run:

<pre>
docker-compose build
docker-compose up
</pre>

After that log into container with `docker exec -it symfony.php bash`, where `symfony.php` is the default container name from `docker-compose.yml`. Then run:

<pre>
composer install
</pre>

From this point forward, application should be available under `http://localhost:8050/`, where port `8050` is default defined in `docker-compose.yml`.
