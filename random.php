<?php
  $a=rand(1,100);
  echo $a."<br>";
  $b=$a; 
for($i=0;$i<5;$i++){
    $a=rand(1,100);
    echo $a."<br>";
          
        if($b<$a){
            $c=$a;
        }
        else{
            $c=$b;
        }
        
         
    }
    echo $c."is the biggest number";
?>