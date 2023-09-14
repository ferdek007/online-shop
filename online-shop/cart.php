<?php
    ob_start();
    //include header.php file
    include('header.php')
?>

<?php

    //include cart-template if not empty
    if(count($product->getData('cart'))){
        include('Template/_cart-template.php');
    }
    else{
        include('Template/notFound/_cart_notFound.php');
    }

    //include wishlist-template if not empty
    if(count($product->getData('wishlist'))){
        include('Template/_wishlist_template.php');
    }
    else{
        include('Template/notFound/_wishlist_notFound.php');
    }

    //include new-phones
    include('Template/_new.php');

?>

<?php
    //include footer.php file
    include('footer.php')
?>