<body>
    {{ include('header.php', {title: 'Add app'}) }}
    <h1>Ajouter un nouvel appartement</h1>
    <span class="text-danger">{{ errors | raw }}</span>
    <form class="form" action="{{path}}appartement/store" method="POST">
        <label>Description</label>
        <input type="text" name="Description" value="{{ appart.Description }}">
        <label>Adresse</label>
        <input type="text" name="Adresse" value="{{ appart.Adresse }}">
        <label>Nombre de chambre</label>
        <input type="number" name="NombreChambre" value="{{ appart.NombreChambre }}">
        <label>Nombre de salle de bain</label>
        <input type="number" name="NombreSalleDeBain" value="{{ appart.NombreSalleDeBain }}">
        <label>surface</label>
        <input type="number" name="Surface" value="{{ appart.Surface }}">
        <label>Prix</label>
        <input type="number" name="Prix" value="{{ appart.Prix }}">
        <input class="btn" type="submit" value="save">
    </form>     
</body>
</html>