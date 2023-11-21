<body>
    {{ include('header.php', {title: 'reserv Edit'}) }}
    <h1>Modifier une reservation</h1>

    <form class="form" action="{{path}}reservation/update" method="POST">
        <input type="hidden" name="id" value=" {{ reserv.id }}">
        <label>Date de Debut</label>
        <input type="date" name="DateDebut" value="{{ reserv.DateDebut}}">
        <label>Date de Fin</label>
        <input type="date" name="DateFin" value="{{ reserv.DateFin }}">
        <label>Locataire</label>
        <select name="Utilisateur_Username">
            {% for usager in usagers %}
            <option value="{{ usager.Username }}" {% if usager.Username == selectedType %} selected="selected"{% endif %}>
                {{ usager.Prenom }} {{ usager.Nom }}</option>
            {% endfor %}
        </select>
        <label>Appartement</label>
        <select name="Appartement_idAppartement">
            {% for appart in apparts %}
            <option value="{{ appart.idAppartement }}" {% if appart.idAppartement == selectedType %} selected="selected"{% endif %}>
                {{ appart.idAppartement }}-{{ appart.Description }}
            </option>
            {% endfor %}
        </select>
        <input class="btn" type="submit" value="save">
    </form>
</body>