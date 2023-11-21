<?php

class Reservation extends CRUD {

    protected $table = 'reservation';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'DateDebut', 'DateFin', 'Utilisateur_Username', 'Appartement_idAppartement'];
    
}

?>