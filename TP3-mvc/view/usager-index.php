<body>
{{ include('header.php', {title: 'Users List'}) }}
    <h1 class="titre-utilis">Liste des usagers</h1>
    <button class="btn-ajout"><a href="{{path}}usager/create">Ajouter un usager</a></button>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Username</th>
            <th>Téléphone</th>
            <th>Courriel</th>
            <th>Type d'utilisateur</th>
            <th>Action</th>    
        </tr>
        {% for usager in usagers %}
            <tr>
                <td>{{ usager.Nom }}</td>
                <td>{{ usager.Prenom }}</td>
                <td>{{ usager.Username }}</td>
                <td>{{ usager.Telephone }}</td>
                <td>{{ usager.Courriel }}</td>
                <td>{{ usager.Type_idType }}</td>
                <td>
                    <div class="bloc-action">
                        <form class="form-action" action="{{path}}usager/destroy" method="POST">
                            <input type="hidden" name="username" value="{{usager.Username}}">
                            <input type="submit" value="Supprimer" class="Btn-sup">
                        </form>
                        <a href="{{path}}usager/edit/{{ usager.Username }}">Modifier</a>
                    </div>   
                </td>
            </tr>
        {% endfor %}
    </table>
</body>
</html>

