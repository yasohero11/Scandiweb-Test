<?php 

namespace APP\Validators;



use App\Core\Validator;
use App\models\Product;

class ProductValidator extends Validator{

    public function __construct($data){
        
        parent::__construct(
            [                
                "name:min" => "Name should be at least 2",
                "name:regex" => "Name should contain at least one upper letter and one number",                                        
            ],
            [
                "name" => "required|max:255|min:2",
                "price"=>"required",
                "sku"=>"required|unique",

                "type" => "required"
            ],
            $data,
            "products");

        
    }

}