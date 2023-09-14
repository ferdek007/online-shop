<!-- Shopping cart section -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Koszyk</h5>

        <!-- Shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <!-- Empty Cart -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-12 text-center py-2">
                        <img src="./assets/empty_cart.png" alt="Empty Cart" class="img-fluid" style="height:200px;">
                        <p class="font-baloo font-size-16 text-black-50">Nic tu nie ma...</p>
                    </div>
                </div>
                <!-- !Empty Cart -->
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