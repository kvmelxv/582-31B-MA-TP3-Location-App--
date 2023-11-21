<body>
    {{ include('header.php', {title: 'App Edit'}) }}
    <h1>Modifier un Appartement</h1>

    <form class="form" action="{{path}}appartement/update" method="POST">
        <input type="hidden" name="idAppartement" value="{{ appart.idAppartement }}">
        <label>Description</label>
        <input type="text" name="Description" value="{{ appart.Description }}">
        <label>Adresse</label>
        <input type="text" name="Adresse" value="{{ appart.Adresse }}">
        <label>Nombre de chambre</label>
        <input type="number" name="NombreChambre" value="{{ appart.NombreChambre }}">
        <label>Nombre de salle de bain</label>
        <input type="number" name="NombreSalleDeBain" value="{{ appart.NombreSalleDeBain }}">
        <label>Surface</label>
        <input type="number" name="Surface" value="{{ appart.Surface }}">
        <label>Prix/ mois</label>
        <input type="number" name="Prix" value="{{ appart.Prix }}">
        <input class="btn" type="submit" value="save">
    </form>
</body>