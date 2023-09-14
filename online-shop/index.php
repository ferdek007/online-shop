<?php
    ob_start();
    //include header.php file
    include('header.php')
?>

<?php

    //include banner-area
    include('Template/_banner-area.php');

    //include top-sale
    include('Template/_top-sale.php');

    //include banner-ads
    include('Template/_banner-ads.php');

    //include all-products
    include('Template/_all-products.php');

    //include new
    include('Template/_new.php');

    //include banner-ads
    include('Template/_banner-ads.php');

?>

<?php
    //include footer.php file
    include('footer.php')
?>