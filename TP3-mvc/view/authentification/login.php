{{ include('header.php', {title: 'Login'}) }}
<div class="container-login">
<span class="text-danger">{{ errors | raw }}</span>
    <form method="POST" action="{{path}}login/authentification">
        <h2 class="titre-login">Authentification</h2>
        <input type="text" name="Username" placeholder="Username" class="input-login" value="{{ usager.Username }}">
        <input type="password" name="Password" placeholder="Password" class="input-login">
        <input type="submit" value="Connexion" class="btn-login">
        <div class="container-lien">
            <a href="{{path}}login/forgot">Mot de passe oublié ?</a>
        </div>
    </form>
</div>