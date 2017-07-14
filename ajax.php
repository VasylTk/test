<?php
require_once('count.php');

if (isset($_GET['action']) && $_GET['action'] == 'getCity'){
    if (isset($arModels[$_GET['region']]))
        echo json_encode($arModels[$_GET['region']]);
    else
        echo json_encode(array('Choose city'));

    die;
}




?>