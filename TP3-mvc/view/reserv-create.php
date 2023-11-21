<body>
    {{ include('header.php', {title: 'add reserv'}) }}
    <h1>Ajouter une nouvelle réservation</h1>
    <span class="text-danger">{{ errors | raw }}</span>
    <form class="form" action="{{path}}reservation/store" method="POST">
        <label>Date de début</label>
        <input type="date" name="DateDebut" value='{{ Reservation.DateDebut }}'>
        <label>Date de fin</label>
        <input type="date" name="DateFin" value='{{ Reservation.DateFin }}'>
        <label>Locataire</label>
        <select name="Utilisateur_Username">
            <option value="">Sélectionner un locataire</option>
            {% if session.Type_idType == 2 %}
               <option value="{{ session.Username }}">{{ session.Prenom }} {{ session.Nom }}</option>
            {% else %}
                {% for usager in usagers %}
                    <option value="{{ usager.Username }}">{{ usager.Prenom }} {{ usager.Nom }}</option>
                {% endfor %}
            {% endif %}
        </select>
        <label>Appartement</label>
        <select name="Appartement_idAppartement">
            <option value="">Selectionner un appartement</option>
            {%  for appart in apparts %}
            <option value="{{ appart.idAppartement }}">{{ appart.idAppartement }} - {{ appart.Description }}</option>
            {% endfor %}
        </select>
        <input class="btn" type="submit" value="save">
    </form>
</body>