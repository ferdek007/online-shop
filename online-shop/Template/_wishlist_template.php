<!-- Shopping cart section -->
<?php
//request method POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['delete_wishlist_submit'])){
        //delete from wishlist
        $deleted_record = $Cart->deleteCart($_POST['item_id'], 'wishlist');
    }

    if(isset($_POST['cart_submit'])){
        //add to cart
        $Cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
    }
}
?>
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Wishlist</h5>

        <!-- Shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach($product->getData('wishlist') as $item):
                    //print_r($item);
                    $cart = $product->getProduct($item['item_id']);
                    //print_r($cart);
                    $subTotal[] = array_map(function($item){
                        ?>
                        <!-- cart item-->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" style="height: 120px;" alt="cart1" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                                <small>kategoria <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                                <!-- product rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">2,137 ocen</a>
                                </div>
                                <!-- !product rating -->

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">
                                    <form method="POST">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? '0'; ?>" name="item_id">
                                        <button type="submit" name="delete_wishlist_submit" class="btn font-baloo text-danger ps-0 pe-3 border-end border-0">Usuń</button>
                                    </form>
                                    <form method="POST">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? '0'; ?>" name="item_id">
                                        <button type="submit" name="cart_submit" class="btn font-baloo text-danger border-0">Dodaj do koszyka</button>
                                    </form>
                                </div>
                                <!-- !product qty -->
                            </div>

                            <div class="col-sm-2 text-end">
                                <div class="font-size-20 text-danger font-baloo">
                                    <span data-id="<?php echo $item['item_id'] ?? "0"; ?>" class="product_price"><?php echo $item['item_price'] ?? "0"; ?></span> zł
                                </div>
                            </div>
                        </div>
                        <!-- !cart item-->
                        <?php
                        return $item['item_price'];
                    }, $cart);
                    //print_r($subTotal);
                endforeach;
                //print_r($subTotal);
                ?>

            </div>
        </div>
        <!-- !Shopping cart items -->
    </div>
</section>
<!-- !Shopping cart section -->