{{ include('header.php', {title: 'Home'}) }}
    <body>
    {% if guest==false %}
        <div class="container">
            <h1>Bienvenue {{ session.Prenom }} {{ session.Nom }} !</h1>
            
            <input type="checkbox" id="toggleCheckbox">
            <label for="toggleCheckbox">Afficher le journal</label>

            <div class="hidden-paragraphs">
                <p class="hidden" id="hiddenParagraph1">Adresse Ip: {{session.IP}}</p>
                <p class="hidden" id="hiddenParagraph2">Date: {{session.Date}}</p>
                <p class="hidden" id="hiddenParagraph3">Pages visitées: {{session.PageVisited}}</p>
            </div>
        </div>
        {% else %}
        <div class="container">
            <h1>Bienvenue dans mon projet MVC !</h1>
        </div>
    {% endif %}
    </body>
</html>