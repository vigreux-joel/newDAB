<?php 

// Retire les espaces à un numéro de téléphone //
function phoneFormat($num) :string {
    $formattedNum = str_replace(" ", "", $num);
    return $formattedNum;
}