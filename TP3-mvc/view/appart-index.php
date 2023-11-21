<body>
{{ include('header.php', {title: 'App List'}) }}
    <h1 class="titre-utilis">Liste des Appartements</h1>
    {% if session.Type_idType == 1 %}
        <button class="btn-ajout"><a href="{{path}}appartement/create">Ajouter un appart</a></button>
    {% endif %}
    <table>
        <tr>
            <th>Id</th>
            <th>Description</th>
            <th>Adresse</th>
            <th>Nombre de chambre</th>
            <th>Nombre de salle de bain</th>
            <th>Surface</th>
            <th>Prix/ mois</th> 
            {% if session.Type_idType == 1 %}
                <th>Action</th>
            {% endif %}
        </tr>
        {% for appart in apparts %}
            <tr>
                <td>{{ appart.idAppartement }}</td>
                <td>{{ appart.Description }}</td>
                <td>{{ appart.Adresse }}</td>
                <td>{{ appart.NombreChambre }}</td>
                <td>{{ appart.NombreSalleDeBain }}</td>
                <td>{{ appart.Surface }}</td>
                <td>{{ appart.Prix }}</td>
                {% if session.Type_idType == 1 %}
                    <td>
                        <div class="bloc-action">
                            <form class="form-action" action="{{path}}appartement/destroy" method="POST">
                                <input type="hidden" name="id" value="{{appart.idAppartement}}">
                                <input type="submit" value="Supprimer" class="Btn-sup-app">
                            </form>
                            <a href="{{path}}appartement/edit/{{ appart.idAppartement }}">Modifier</a>
                        </div>   
                    </td>
                {% endif %}
            </tr>
        {% endfor %}
    </table>
</body>
</html>

