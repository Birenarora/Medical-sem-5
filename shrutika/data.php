<?php
function get_price($name)
{
    $products = [
            "ques1"=>"Emergency facilities for health check-up. We also sell daily-need products.",
            "ques2"=>"Yes we do have. We have monthly health check-up schemes and also on special occassions we give discounts.",
            "ques3"=>"Yes it is available in our store. We also specially order if it is not available in our stock."
    ];
    foreach($products as $product=>$price)
    {
            if($product==$name)
            {
                    return $price;
            }
    }
}
?>