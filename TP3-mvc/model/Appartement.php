<?php

class Appartement extends CRUD {

    protected $table = 'appartement';
    protected $primaryKey = 'idAppartement';

    protected $fillable = ['idAppartement', 'Description', 'Adresse', 'NombreChambre', 'NombreSalleDeBain', 'Surface', 'Prix'];

}

?>