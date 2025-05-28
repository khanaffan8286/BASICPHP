<?php

// $multdimen = [
//      [1,2,3],
//      [4,5,6],
//      [7,8,9]
// ];

$multdimen = [
    [
        [1,2,3],
        [4,5,6],
        [7,8,9]
    ],
    [
        [10,11,12],
        [13,14,15],
        [16,17,18]
    ],
    [
        [19,20,21],
        [22,23,24],
        [25,26,27]
    ]
    ];

// for ($i=0; $i <count($multdimen) ; $i++) { 
//     echo $i;
//     echo "<br>";
//     echo " ";
// };

// for ($i=0; $i < count($multdimen); $i++) { 
//     for ($k = 0 ; $k<count($multdimen) ; $k++){
//         echo $multdimen[$i][$k];
//         echo " ";   
       
//     }
//     echo "<br>";
// }
echo "you can see a multidimensional array <br>";

for ($i= 0; $i <count($multdimen); $i++){
    for ($j=0; $j<count($multdimen); $j++){
        for ($k=0; $k<count($multdimen); $k++){
            
            echo $multdimen[$i][$j][$k];
            echo " ";
        }
        echo "<br>";
    }
}

?>