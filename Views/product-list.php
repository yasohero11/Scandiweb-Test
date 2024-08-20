<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scandiweb Test Assignment</title>

<link href="../public/assets/css/style.css" rel="stylesheet" type="text/css">
</head>



<body>
    <!--Start header-->
    <header>
        <div class="container" id="header">


            <div id="header-body">
                
                    <h1>Product List</h1>
             
                <div  id="buttons">

                    <button type="button"  class="btn btn-secondary"
                        onclick="window.location.href=' /addproduct'">ADD</button>
                    <button type="button" class="btn btn-danger" id="delete-product-btn" onclick="executeMassDelete()">MASS DELETE</button>
                </div>
            </div>
            <hr>
        </div>
    </header>
    <!--End header-->

    <!--Start Main-->
   
        <div class="producs-container">
            <form method="post" action="/massDelete" id="massDeleteForm">
            <div class="product-list">
                <!--cards-->
                <?php foreach($data as $row) :?>
                
                    <div class="card card-body card-style">
                        <div class="form-check checkbox">

                            <input class="form-check-input delete-checkbox " name="ids[]" value="<?=$row->getId()?>" type="checkbox" id='<?=$row->getId()?>'>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <?=$row->getSku()?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <?=$row->getName()?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <?=$row->getPrice()?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <?=$row->getType()?>
                            </h6>

                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <?=$row->getSpecificAttribute()?>
                            </h6>
                        </div>
                    </div>
               
                <?php endforeach;?>
            </div>
                </form>
        </div>


   
    <footer class="footer">
      
            <hr>
            <h4 class="title">Scandiweb Test Assignment</h4>
       
    </footer>

 <script src="../public/assets/js/app.js"></script>

</body>

</html>