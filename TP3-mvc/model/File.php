<?php

class File extends CRUD {

    protected $table = 'file';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name'];
    
}

?>