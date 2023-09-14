<!-- Shopping cart section -->
<?php
//request method POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['delete_cart_submit'])){
        //delete from cart
        $deleted_record = $Cart->deleteCart($_POST['item_id']);
    }

    //save for later
    if(isset($_POST['wishlist_submit'])){
        //add to wishlist
        $Cart->saveForLater($_POST['item_id']);
    }
}
?>
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Koszyk</h5>

        <!-- Shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach($product->getData('cart') as $item):
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
                            <div class="d-flex font-rale w-25">
                                <button data-id="<?php echo $item['item_id'] ?? "0"; ?>" class="qty-up border bg-light"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?? "0"; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? "0"; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                            <form method="POST">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? '0'; ?>" name="item_id">
                                <button type="submit" name="delete_cart_submit" class="btn font-baloo text-danger px-3 border-end border-0">Usuń</button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? '0'; ?>" name="item_id">
                                <button type="submit" name="wishlist_submit" class="btn font-baloo text-danger border-0">Dodaj do Wishlisty</button>
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
            <!-- subtotal section -->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Darmowa dostawa</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Razem (przedmioty: <?php echo isset($subTotal) ? count($subTotal) : 0; ?>):&nbsp; <span class="text-danger"><span id="deal-price" class="text-danger"><?php echo isset($subTotal) ? $Cart->getSum($subTotal):0; ?></span> zł</span></h5>
                        <button type="submit" class="btn btn-warning mt-3">Kup teraz</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section -->
        </div>
        <!-- !Shopping cart items -->
    </div>
</section>
<!-- !Shopping cart section -->