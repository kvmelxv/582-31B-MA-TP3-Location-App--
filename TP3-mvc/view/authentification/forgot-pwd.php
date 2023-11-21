{{ include('header.php', {title: 'Mot de passe oublié'}) }}
<div class="container-forgot">
<span class="text-danger">{{ errors | raw }}</span>
    <form action="{{path}}login/tempPass" method="POST">
        <h2 class="titre-forgot">Mot de passe oublié</h2>
        <label for="" class="label-forgot">Veuillez inscrire votre nom d'utilisateur.</label>
        <input type="text" name="Username" placeholder="Username" class="input-forgot" value="{{usager.Username}}">
        <input type="submit" value="Soumettre" class="btn-forgot">
    </form>
</div>