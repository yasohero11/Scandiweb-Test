<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Router;
use App\Models\Product;
use App\Validators\ProductValidator;


class ProductController extends Controller
{
    public function show()
    {
        //Product::insert(["name"=>"bansns" , "type" => "book" , "price" => 200 , "weight" => 25]);

        $data =    Product::fetchProducts();


        $this->view('product-list' , $data);
    }

    public function add()
    {
        $this->view('product-add');
    }

    public function create( Request $request)
    {
        $productValidator = new ProductValidator($request->getBody());
        if(!$productValidator->validate()){
            echo json_encode(["success" => false , "errors" =>  $productValidator->errors()]);
            exit();
        };

        $filtered_array = array_filter($request->getBody(), function($value) {
            return $value !== "";
        });


        $result = Product::insert($filtered_array);


        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Product created successfully!',
                'data' => $filtered_array
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to create product.',
            ];
        }


        echo json_encode($response);
    }

    public function delete(Request  $req)
    {




        Product::where("id" , "in", "(".implode(',',$req->getBody()["ids"] ).")" );
        Product::delete();
        $response = [
            'success' => true,
            'message' => 'Product created successfully!',

        ];
        echo json_encode($response);
    }


}
