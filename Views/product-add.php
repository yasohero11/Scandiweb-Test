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
            </Button>
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

                <span class="error "></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-3">
                <input name="name"  class="form-control" id="name"  >
                <span class="error"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-3">
                <input name="price" type="number" class="form-control" id="price" >
                <span class="error"></span>
            </div>
        </div>
        <div class="dropdown">
            <label class="col-sm-2 col-form-label">Type Switcher</label>
            <select class="dropdown-toggle" type="button" id="productType" name="type" style="width: 300px;"
                    onchange="productTypeChanged(this.value);" >
                <option value="">Type Switcher</option>
                <option value="DVD">DVD-Disc</option>
                <option value="Furniture">Furniture</option>
                <option value="Book">Book</option>
                <br>
            </select><br><br>
            <span class="error"></span>
        </div>
        <br>


        <div id="controls-section">


        <div id="DVD" class="controls controls-DVD" >
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-3">
                    <input name="size" type="number" class="form-control" id="size" ><br>
                    <strong>Please, provide disc space in MB</strong>
                </div>
            </div>
        </div>
        <div id="Furniture" class="controls controls-Furniture" >
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-3">
                    <input name="height" type="number" class="form-control" id="height" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-3">
                    <input name="width" type="number" class="form-control" id="width" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-3">
                    <input name="length" type="number" class="form-control" id="length" ><br>
                    <strong>Please, provide dimensions</strong>
                </div>
                <br>
            </div>
        </div>
        <div id="Book" class="controls controls-Book" >
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-3">
                    <input name="weight" type="number" class="form-control" id="weight" ><br>
                    <strong>Please, provide weight in KG</strong>
                </div>
                <br>
            </div>
        </div>
        </div>
    </form>






        <footer class="footer">
      
      <hr>
      <h4 class="title">Scandiweb Test Assignment</h4>
 
</footer>




<script src="../public/assets/js/add_product.js"></script>

</body>


</html>
