
<?php  

function passMarks($marks){
    $sum = 0;
    foreach($marks as $value){
        $sum = $sum + $value;

    } 
    return $sum;
}

$affan = [65,75,87,85,74,65];
$marks = passMarks($affan);
echo "Total marks of Affan is $marks<br>";


?>