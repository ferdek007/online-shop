<!-- All Products -->
<?php
//$product_shuffle = $product->getData();

$brand = array_map(function($prod){ return $prod['item_brand']; }, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);
//print_r($unique);

//request method POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['special_price_submit'])){
        //add to cart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Produkty</h4>
        <hr>
        <div id="filters" class="button-group text-end font-baloo font-size-16">
            <button class="btn is-checked border-0" data-filter="*">Wszystko</button>
            <?php
                array_map(function($brand){
                    printf('<button class="btn border-0" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function($item) use($in_cart){ ?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"; ?>">
                <div class="item py-2" style="width:190px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span><?php echo $item['item_price'] ?? "0"; ?> zł</span>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? "1"; ?>">
                                <input type="hidden" name="user_id" value="<?php echo "2"; ?>">
                                <?php
                                    if(in_array( $item['item_id'], $in_cart ?? [])){
                                        echo '<button type="submit" disabled class="btn btn-secondary font-size-12">W koszyku</button>';
                                    }
                                    else{
                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Dodaj do koszyka</button>';
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle); ?>
        </div>
    </div>
</section>
<!-- !All Products -->