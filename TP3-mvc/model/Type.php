<?php

class Type extends CRUD {

    protected $table = 'type';
    protected $primaryKey = 'idType';

    protected $fillable = ['idType', 'type'];
    
}

?>