{{ include('header.php', {title: 'Nouveau Mot de passe'}) }}
<div class="container-forgot">
<span class="text-danger">{{ errors | raw }}</span>
    <form action="{{path}}login/newPasswordUpdate" method="POST">
        <h2 class="titre-forgot">Nouveau Mot de passe</h2>
        <label for="" class="label-forgot">Veuillez inscrire votre nouveau mot de passe.</label>
        <input type="password" name="password" placeholder="nouveau mot de pasee" class="input-forgot" value="">
        <input type="hidden" name="Username" value="{{Username}}">
        <input type="submit" value="Soumettre" class="btn-forgot">
    </form>
</div>
</html>