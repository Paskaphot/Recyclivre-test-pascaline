Ceci est le projet de test.

C'est un projet Symfony (https://symfony.com), à démarrer dans un environnement PHP.

2 solutions pour ça :  
- soit tu as déjà un environnement PHP sur ta machine et tu donc tu n'as qu'à configurer le projet dedans
- soit tu installes Docker (+ Docker Compose) sur ta machine et dans ton terminal tu pourras démarrer le projet en faisant un `docker-compose up -- build` et là, si tout se passe bien, il sera accessible à l'url http://localhost:8000.

Après ça, une fois que tu auras un environnement de dev PHP branché sur ce projet Symfony, tu devras faire un composer install pour charger les dépendances du projet :  
- soit dans ton env de dev si tu en as un sur ta machine
- soit dans le container Docker si tu as utilisé Docker, pour ça tu peux faire `docker compose run gateway composer install` (tu run la commande composer install dans le container gateway), dans une autre fenêtre de terminal (normalement la première est "occupée" par ton `docker-compose up`)

De la même façon tu pourras soit faire `docker compose run gateway npm run watch` (ou `docker compose run gateway npm run dev`) quand tu feras l'intégration et que tu voudras recompiler les assets (ou alors tu pourras utiliser ton nodejs local si tu as un nodejs déjà installé en local sur ta machine).