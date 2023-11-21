<body>
{{ include('header.php', {title: 'Reserv List'}) }}
    <h1 class="titre-utilis">Liste des réservations</h1>
    <button class="btn-ajout"><a href="{{path}}reservation/create">Ajouter une réservation</a></button>
    <table>
        <tr>
            <th>Id</th>
            <th>Date de Debut</th>
            <th>Date de Fin</th>
            <th>Locataire</th>
            <th>Appartement</th> 
            {% if session.Type_idType == 1 %}
               <th>Action</th>
            {% endif %}
        </tr>
        {% for book in books %}
            <tr>
                <td>{{ book.id }}</td>
                <td>{{ book.DateDebut }}</td>
                <td>{{ book.DateFin }}</td>
                <td>{{ book.Utilisateur_Username }}</td>
                <td>{{ book.Appartement_idAppartement }}</td>
                {% if session.Type_idType == 1 %}
                    <td>
                        <div class="bloc-action">
                            <form class="form-action" action="{{path}}reservation/destroy" method="POST">
                                <input type="hidden" name="id" value="{{book.id}}">
                                <input type="submit" value="Supprimer" class="Btn-sup">
                            </form>
                            <a href="{{path}}reservation/edit/{{ book.id }}">Modifier</a>
                        </div>   
                    </td>
                {% endif %}
            </tr>
        {% endfor %}
    </table>
</body>
</html>
