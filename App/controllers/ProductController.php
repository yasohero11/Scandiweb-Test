<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Router;
use App\Models\Product;



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
        $filtered_array = array_filter($request->getBody(), function($value) {
            return $value !== "";
        });

        Product::insert($filtered_array);

        $this->redirect("/");
    }

    public function delete(Request  $req)
    {



        Product::where("id" , "in", "(".implode(',',array_values($req->getBody()["ids"])).")" );
        Product::delete();
        $this->redirect('/');
    }

/*


    public function create()
    {
        $request = $_REQUEST;
        $product = $this->model(ucfirst($request['productType']));
        $product->add($request);
        $this->redirect('/');
    }

    public function delete()
    {
        $request = $_REQUEST;
        $product = new Product();
        $product->delete($request);
        $this->redirect('/');
    }
    */
}
