<?php
function inputElement($icon, $placeholder,$name ,$value){
    $ele= "
    <div class=\"input-group mb-2\">
                    <div class=\"input-group-prepend\">
                     <div class=\"input-group-text bg-success\">$icon</div>
                   </div>
                  <input type=\"text\" autocomplete=\"off\" name='$name'  value='$value' placeholder=' $placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" >
                </div>
    
    
    
    ";
    echo $ele;
}
 function buttonElement ($btnid,$styleclass,$text,$name,$attr){
     $btn ="
     <button name='$name' '$attr'    class='$styleclass' id='$btnid'>$text</button>
     ";
     echo $btn;

 }