<!-- Top Sale -->
<?php
//$product_shuffle = $product->getData();
shuffle($product_shuffle);

//request method POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['top_sale_submit'])){
        //add to cart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<section id="top-sale">
    <div class="container pt-5 pb-2">
        <h4 class="font-rubik font-size-20">Promocje</h4>
        <hr>
        <!-- Owl-carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach($product_shuffle as $item){?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
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
                                if(in_array( $item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
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
            <?php }; //closing foreach ?>
        </div>
        <!-- !Owl-carousel -->
    </div>
</section>
<!-- !Top Sale -->