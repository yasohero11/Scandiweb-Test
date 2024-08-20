<?php

function makebook( $row){
    return '<p>Weight: ' . $row['weight'] . ' KG</p>';
}

function makeDVD($row){
    return '<p>Size: ' . $row['size'] . ' MB</p>';
}

function makefurniture($row){
    return '<p style="font-size: 14px;">Dimensions: ' . $row['height'] . ' x ' . $row['width'] . ' x ' . $row['length'] . '</p>';
}


function test($type , $row){
    $funcName = "make".$type;
    echo  call_user_func($funcName,$row);
}



