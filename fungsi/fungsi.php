<?php

function nominal($parameter){
    $hasil = number_format($parameter,0,',','.');
    return $hasil;
}

?>