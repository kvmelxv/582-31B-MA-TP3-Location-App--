<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{path}}css/style.css">

    <title>{{ title }}</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <div>
                  <li><a href="{{path}}">Accueil</a></li>
                </div>
                {% if guest %}
                <div>
                    <li><a href="{{path}}login">Login</a></li>
                </div>
                {% else %}
                    {% if session.Type_idType == 1 %}
                    <div>
                        <li><a href="{{path}}usager">Liste de tous les utilisateurs</a></li>
                    </div>
                    <div>
                        <li><a href="{{path}}appartement">Liste de tous les appartements</a></li>
                    </div>
                    <div>
                        <li><a href="{{path}}reservation">Liste de toutes les réservations</a></li>
                    </div>
                    <div>
                        <li><a href="{{path}}File">Télécharger une image</a></li>
                    </div>
                    {% elseif session.Type_idType == 2 %}
                    <div>
                        <li><a href="{{path}}appartement">Liste de tous les appartements</a></li>
                    </div>
                    <div>
                       <li><a href="{{path}}reservation/create">Faire une réservation</a></li>
                    </div>
                    <div>
                        <li><a href="{{path}}File">Télécharger une image</a></li>
                    </div>
                {% endif %}
                <div>
                    <li><a href="{{path}}login/logout">Logout</a></li>
                </div>
                <div class="user">
                   <p>Username: {{session.Username}}</p>
                </div>
                {% endif %}
            </ul>
        </nav>
    </header>   
</body>
</html>