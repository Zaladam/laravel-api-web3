# Application Api Backend Laravel

## Prérequis :
1. Avoir Wamp, Lamp, Xamp ou autre logiciel permettant de faire tourner une base de données.
2. Avoir PHP et composer installé.

## Etapes pour faire tourner le projet en local :
1. Clonner le repo git grâce au lien suivant : https://github.com/Zaladam/laravel-api-web3
2. Lancer sur le terminal la commande ```composer install```.
3. Créer un fichier .env en se basant sur le fichier .env.example
4. Pour démarrer le projet lancer la commande ```php artisan serve```.

## Utilisation de l'api :
#### Pour utiliser l'api la plupart des requests ont besoin d'un token
##### (Pour une meilleure utilisation, je vous recommande Postman qui permet d'envoyer des request plus facilement que de les hardcoder dans un fichier .http)
1. Pour cela lancer une request POST sur {{mon ip}}/api/users/register

    ![screen postman register](C:\Users\adam1\Downloads\postmanRegister.png)

2. Ensuite modifiez le champ admin de votre nouvel user dans votre DB à 1.
   ![screen postman register](C:\Users\adam1\Downloads\phpAdmin.png)
3. Lancez la request POST Post sur {{mon ip}}/api/users/login avec les parameters suivant
   ![screen postman register](C:\Users\adam1\Downloads\postmanLogin.png)
4. Ensuite un token sera renvoyer et vous permettra de lancer les request voulu en l'insérant
   ![screen postman register](C:\Users\adam1\Downloads\resultRequest.png)
