<?php
    ob_start();
    //include header.php file
    include('header.php')
?>

<?php

    //include products
    include('Template/_products.php');

    //include top-sale
    include('Template/_top-sale.php');

?>

<?php
    //include footer.php file
    include('footer.php')
?>