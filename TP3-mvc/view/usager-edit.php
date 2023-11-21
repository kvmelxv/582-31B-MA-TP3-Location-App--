<body>
    {{ include('header.php', {title: 'User Edit'}) }}
    <h1>Modifier un usager</h1>
    <p>Les Usernames ne peuvent pas etre modifier. Ce sont des valeurs uniques.</p>
    <form class="form" action="{{path}}usager/update" method="POST">
        <label>Username</label>
        <input type="text" name="Username" value="{{ usager.Username}}">
        <label>Nom</label>
        <input type="text" name="Nom" value="{{ usager.Nom }}">
        <label>Prénom</label>
        <input type="text" name="Prenom" value="{{ usager.Prenom }}">
        <label>Téléphone</label>
        <input type="text" name="Telephone" value="{{ usager.Telephone }}">
        <label>Courriel</label>
        <input type="email" name="Courriel" value="{{ usager.Courriel }}">
        <label>Type d'utilisateur</label>
        <select name="Type_idType">
            {% for type in types %}
            <option value="{{ type.idType }}" {% if type.idType == selectedType %} selected="selected"{% endif %}>
                {{ type.type }}
            </option>
            {% endfor %}
        </select>
        <input class="btn" type="submit" value="save">
    </form>
</body>