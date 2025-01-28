<?php

class Laptop
{
    public $id;
    public $category;
    public $merk;
    public $type;
    public $memory;
    public $hd;
    public $prijs;

    function __construct()
    {
        settype($this->id, 'integer');
    }
}

?>
