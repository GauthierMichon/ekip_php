# README

## Cloner le projet

Après avoir récupérer le projet sur git, et avoir lancer votre terminal dans le bon dossier. Vous faites les commandes suivantes : 

`symfony console doctrine:database:create`
<br/>`symfony console doctrine:migrations:migrate`
<br/>`symfony console doctrine:fixtures:load`

`composer require symfony/webpack-encore-bundle --dev`
<br/>`yarn install`
<br/>`yarn add @symfony/webpack-encore --dev`
<br/>`yarn add sass-loader@^9.0.1 node-sass --dev`

`yarn encore dev`


Il est possible que vous ayez cette erreur : 
<br/>`Error: Node Sass version 5.0.0 is incompatible with ^4.0.0.`

Dans ce cas faites ces 2 commandes : 
<br/>`npm uninstall node-sass `
<br/>`npm install node-sass@4.14.1`

Puis refaites `yarn encore dev`

Enfin lancer votre server avec la commande : 
<br/>`symfony server:start`

Allez à cet url : 
<br/>`http://127.0.0.1:8000/`