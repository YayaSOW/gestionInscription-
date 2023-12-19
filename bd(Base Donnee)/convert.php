<?php
function fromJsonToArray(string $key=null):array{
    $json=file_get_contents(DB);  // le $json est en format .json d'abord
    // var_dump($json);
    $arrayData=json_decode($json,true); // mtn il est en array
    return $key==null? $arrayData:$arrayData[$key];
}

function fromArrayToJson(string $key,array $newData){
    $arrayData=fromJsonToArray();
    $arrayData[$key][]=$newData;
    $json=json_encode($arrayData);
    file_put_contents(DB,$json);
}

?>