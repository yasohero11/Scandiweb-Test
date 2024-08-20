<?php
namespace App\models;

class DVD extends Product {
    private $size;

    public function __construct($id,$sku, $name, $price, $size) {
        parent::__construct($id,$sku, $name, $price);
        $this->size = $size;
    }

    public function getSpecificAttribute() {
        return "Size: " . $this->size . " MB";
    }

    // Setters and getters for specific attributes
    public function getSize() { return $this->size; }
    public function setSize($size) { $this->size = $size; }

    function getType()
    {
        return "DVD";
    }
}




