<!-- Product -->
<?php
$item_id = $_GET['item_id'] ?? 1;

//request method POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['products_submit'])){
        //add to cart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

foreach($product->getData() as $item):
    if($item['item_id'] == $item_id):
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product" class="img-fluid">
                <div class="form-group row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Kup teraz</button>
                    </div>
                    <div class="col">
                        <form method="POST">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? "1"; ?>">
                            <input type="hidden" name="user_id" value="<?php echo "2"; ?>">
                            <?php
                                if(in_array( $item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-secondary font-size-16 form-control">W koszyku</button>';
                                }
                                else{
                                    echo '<button type="submit" name="products_submit" class="btn btn-warning font-size-16 form-control">Dodaj do koszyka</button>';
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>kategoria <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">2,137 ocen | 100+ potwierdzonych opinii</a>
                </div>
                <hr class="m-0">

                <!-- Product price-->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>Wcześniej:</td>
                        <td><strike>162.99 zł</strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Cena teraz:</td>
                        <td class="font-size-20 text-danger"><span><?php echo $item['item_price'] ?? "0"; ?></span> zł<small class="text-dark font-size-12">&nbsp;&nbsp;razem z VAT</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Oszczędzasz:</td>
                        <td><span class="fonr-size-16 text-danger">10.00 zł</span></td>
                    </tr>
                </table>
                <!-- !Product price-->

                <!-- Policy-->
                <div class="policy">
                    <div class="d-flex">
                        <div class="return text-center">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Rok <br> Gwarancji</a>
                        </div>
                        <div class="return text-center ms-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">14 Dni <br>na zwrot</a>
                        </div>
                        <div class="return text-center ms-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Dostawa <br>kurierem</a>
                        </div>
                    </div>
                </div>
                <!-- !Policy-->
                <hr>

                <!-- Order details -->
                <div id="order-details" class="font-rale d-flex flex-column ttext-dark">
                    <small>Dostawa: 29 Maj - 1 Czerwiec </small>
                    <small>Sprzedawca <a href="#">OnlineShopper</a> (5 z 5 | 2,137 opinii)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Dostawa do klienta - 456123</small>
                </div>
                <!-- !Order details -->

                <div class="row">
                    <div class="col-6">
                        <!-- product qty section -->
                        <div class="qty d-flex my-5">
                            <h6 class="font-baloo">Ilość:</h6>
                            <div class="px-4 d-flex font-rale">
                                <button data-id="<?php echo $item['item_id'] ?? "0"; ?>" class="qty-up border bg-light"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?? "0"; ?>" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? "0"; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        <!-- !product qty section -->
                    </div>
                </div>

                <!-- Size -->
                <div class="size my-3">
                    <h6 class="font-baloo">Dodatki:</h6>
                    <div class="d-flex justify-content-start w-75">
                        <div class="font-rubik border p-2 ms-2">
                            <button class="btn p-0 font-size-14 border-0">Brelok</button>
                        </div>
                        <div class="font-rubik border p-2 ms-2">
                            <button class="btn p-0 font-size-14 border-0">Smycz</button>
                        </div>
                        <div class="font-rubik border p-2 ms-2">
                            <button class="btn p-0 font-size-14 border-0">Naklejki</button>
                        </div>
                    </div>
                </div>
                <!-- !Size -->

            </div>

            <div class="col-12 pt-5">
                <h6 class="font-rubik">Opis produktu</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eius rerum quasi exercitationem aspernatur cum fuga sapiente aliquam, veritatis alias officiis obcaecati itaque ducimus aliquid. Quo officiis labore deserunt, dicta dolore velit adipisci odit minima. Fugit doloremque hic inventore ea, minima molestias cum perspiciatis maxime enim illum praesentium magnam sint beatae! Quod asperiores officiis minus nostrum vero placeat debitis eos?</p>
                <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eius rerum quasi exercitationem aspernatur cum fuga sapiente aliquam, veritatis alias officiis obcaecati itaque ducimus aliquid. Quo officiis labore deserunt, dicta dolore velit adipisci odit minima. Fugit doloremque hic inventore ea, minima molestias cum perspiciatis maxime enim illum praesentium magnam sint beatae! Quod asperiores officiis minus nostrum vero placeat debitis eos?</p>
            </div>
        </div>
    </div>
</section>
<!-- !Product -->
<?php
    endif;
    endforeach;
    ?>