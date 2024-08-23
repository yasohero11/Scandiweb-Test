<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../public/assets/css/style.css" rel="stylesheet" type="text/css">

    <link href="../public/assets/css/inputStyles.css" rel="stylesheet" type="text/css">

    <title>Scandiweb test Assignment</title>

</head>

<body>
<header>
        <div class="container" id="header">


            <div id="header-body">
                
                    <h1>Product Add</h1>
             
                <div  id="buttons">

                <a href="/" name="Cancel" class="btn btn-secondary">
                CANCEL
            </a>
            <button id="saveBtn" class="btn btn-primary">
                SAVE
            </button>
                </div>
            </div>
            <hr>
        </div>
    </header>




    <form id="product_form"
          action="/addproduct"
          method="POST" class="form-data">

      
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-3">
                <input name="sku" type="varchar" class="form-control" id="sku" >

                <span class="error" id="sku-error"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-3">
                <input name="name"  class="form-control" id="name"  >
                <span class="error" id="name-error"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-3">
                <input name="price" type="number" class="form-control" id="price" >
                <span class="error" id="price-error"></span>
            </div>
        </div>

            <label class="col-sm-2 col-form-label">Type Switcher</label>
            <select class="dropdown-toggle"  id="productType" name="type" style="width: 300px;">
                <option  value="">Type Switcher</option>
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
                <option value="Book">Book</option>

            </select>
            <span class="error" id="type-error"></span>




        <div id="controls-section">



        </div>
    </form>






        <footer class="footer">
      
      <hr>
      <h4 class="title">Scandiweb Test Assignment</h4>
 
</footer>




<script src="../public/assets/js/add_product.js"></script>

</body>


</html>
