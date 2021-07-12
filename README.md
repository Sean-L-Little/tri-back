# tri-back
Back en PHP du trieur de listes

Pour lancer le back en PHP, il suffit d'ouvrir un terminal dans le repo et executer ```php -S 127.0.0.1:8000 -t public```

Ce serveur utilise MySQL pour la base de données nommé ```tri_list_db```, il peut éventuellement y avoir besoin de modifier la ligne 30 du fichier ```.env``` pour que ça fonctionne sur votre machine ou bien d'initialiser une bdd vierge avec le nom ```tri_list_db```.


J'ai choisi de faire le back en PHP avec Symfony, puisque c'est ce que vous utilisez déjà. Je ne connaisait que très peu PHP avant de me lancer là dedans et je n'avais jamais touché à Symfony donc ça a été une bonne experience d'apprentisage du language PHP et du framework Symfony.
