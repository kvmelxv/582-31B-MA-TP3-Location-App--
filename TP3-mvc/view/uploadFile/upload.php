{{ include('header.php', {title: 'Upload'}) }}
<body>
    <div class="container-file">
    <span class="text-danger">{{ errors | raw }}</span>
        <h1>Ajouter une image</h1>
        <form action="{{path}}file/uploadImg" method="POST" enctype="multipart/form-data">
    
           <label for="file">Fichier</label>
           <input type="file" name="file">

           <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>