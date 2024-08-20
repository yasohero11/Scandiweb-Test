<?php
namespace App\models;

use App\Core\BaseModel;


abstract class Product extends  BaseModel{

    protected static $table = "products";
    protected $id;
    protected $sku;
    protected $name;
    protected $price;

    public function __construct($id,$sku, $name, $price) {
        $this->sku = $sku;
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    static private   $map  = [
        "DVD" => DVD::class,
        "Furniture" => Furniture::class,
        "Book" => Book::class
    ];


    public static function create($type, $data) {
        if (isset(self::$map[$type])) {
            $className = self::$map[$type];
            return new $className(...$data);
        }

        throw new \Exception("Class for type $type does not exist");
    }


    public static function fetchProducts(){
        $products  = parent::select();
        $productObjects= [];
        foreach ($products as $product) {



            $data = array_filter([
                $product->id,
                $product->sku,
                $product->name,
                $product->price,
                $product->weight ?? null,
                $product->size ?? null,
                $product->height ?? null,
                $product->width ?? null,
                $product->length ?? null
            ]);



            try {
                $productObjects[] = self::create($product->type, $data);

            } catch (\Exception $e) {
            }
        }

        return $productObjects;

    }

   abstract function getSpecificAttribute();
   abstract function getType();
    public function getSku() { return $this->sku; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getId() { return $this->id; }
}