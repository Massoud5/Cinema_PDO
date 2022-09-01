# PDO notes

### Definitions

- Design Pattern: 
    Model de conception(adobter des solution pour organiser le code, travail d'équipe, respect des convention)

- MVC: 
    gérer les données et la logique métier (Model), gérer le layout et display (View), faire le lien entre model et view afin de demander des données à model et l'envoyer à view (Contoller)

- Encapsulation: 
    Le fait de regrouper et méthodiser l'accès aux données (attributs) dans une classe afin d'avoir une ou plusieurs donnés dans un format spécifié pour éviter les donnés qui seront stockés de manière incohérant. Par exemple:  la méthode "_toString()".

- PDO: 
    fournir une couche d'abstraction (qui est un accès sécurisé) peu importe la base de donnée qu'on utilise pour accéder aux données

- DAO: 
    extention qui permet un accès aux données d'un système de base de donnée

- Temporisation de sortie: 
    PHP peut bloquer l’envoi des données au navigateur grâce à la fonction ob_start() qui enclenche une temporisation de sortie. Cela signifie que les données ne sont pas directement envoyées mais temporairement mises en tampon.
    L’intérêt de la temporisation est de pouvoir travailler sur le contenu avant de l’envoyer au navigateur.

    ob_get_clean() -> Arrêt de la temporisation et renvoi du tampon de sortie


Errors:
- Undefined index error -> problem in SQL

- All errors: https://stackoverflow.com/questions/12769982/reference-what-does-this-error-mean-in-php


                                   
