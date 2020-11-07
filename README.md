# README

## Cloner le projet

Après avoir récupérer le projet sur git, et avoir lancer votre terminal dans le bon dossier. Vous faites les commandes suivantes : 

`symfony console doctrine:database:create`
`symfony console doctrine:migrations:migrate`
`symfony console doctrine:fixtures:load`

`composer require symfony/webpack-encore-bundle --dev`
`yarn install`
`yarn add @symfony/webpack-encore --dev`
`yarn add sass-loader@^9.0.1 node-sass --dev`

`yarn encore dev`


Il est possible que vous ayez cette erreur : 
`Error: Node Sass version 5.0.0 is incompatible with ^4.0.0.`

Dans ce cas faites ces 2 commandes : 
`npm uninstall node-sass `
`npm install node-sass@4.14.1`

Puis refaites `yarn encore dev`

Enfin lancer votre server avec la commande : 
`symfony server:start`

Allez à cet url : 
`http://127.0.0.1:8000/`