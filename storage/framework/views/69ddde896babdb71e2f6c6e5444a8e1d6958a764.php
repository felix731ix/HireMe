<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/layout/navbar_marketplace.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/fontello.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/checkout/cart.css')); ?>">
    <?php echo $__env->make('bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>My Cart</title>
</head>
<body>
<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('layout/navbar_marketplace_authuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('layout/navbar_marketplace', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<div class="cart-title container">
    My Cart
</div>
<?php if(count($carts) < 1): ?>
    <section class="container" style="text-align: center">
        <img src="<?php echo e(URL::asset('asset/Illustrations/empty_cart.svg')); ?>" width="364px" height="364px">
        <div>
            <h5 style="font-weight: normal!important; font-style: italic; font-size: 1.4rem !important;line-height: 1.5;margin: 1em 0; padding: 0 35%">Looks still empty here, let's fill it with your favorite products shall we</h5>
            <form ACTION="/marketpage">
                <button class="btnMarket">Explore marketplace</button>
            </form>
        </div>
    </section>
<?php else: ?>
<section class="container">
    <div class="row">
        <div class="col-8">
            <?php
            $sumTotal = 0;
            ?>
            <?php for($i=0;$i<count($carts);$i++): ?>
                <div class="d-flex card-item">
                    <img src="<?php echo e(Storage::url($carts[$i]->products->image)); ?>" width="122px" height="122px"
                         style="border-radius: 16px">
                    <div style="justify-content: space-between">
                        <div>
                            <h6>NYChop</h6>
                            <h3><?php echo e($carts[$i]->products->name); ?></h3>
                            <h5>Rp <?php echo number_format($carts[$i]->products->price,0,',','.'); ?></h5>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div  class="d-flex form" style="align-items: end">
                                <div style="font-size: 1.4rem; border-right: solid 1px var(--gray_3); padding-right: 2em">
                                    <label style="margin: 0">Quantity</label>
                                    <input id="input-qty" price=<?php echo e($carts[$i]->products->price); ?> product-id=<?php echo e($carts[$i]->products->id); ?> name="inputQty" style="text-align: right; width: 2vw" type="number" onchange="updateQty(this)" class="input-form input-qty" min="1" value="<?php echo e($carts[$i]->quantity); ?>">
                                </div>
                            </div>
                            <div class="icon">
                                <form action="/remove/<?php echo e($carts[$i]->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('delete')); ?>

                                    <button style="border: transparent;cursor:pointer;outline: none; background-color: transparent">
                                        <span class="iconify align-middle" style="font-size: 2.0rem; color: var(--red)" data-icon="ri:delete-bin-7-line"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php
                        $sumTotal = $sumTotal + ($carts[$i]->quantity * $carts[$i]->products->price);
                        ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="col">
            <div class="checkout-area">
                <span>Checkout summary</span>
                <div class="d-flex row checkout-details">
                    <span class="flex-shrink-1 col">Total price(<span id="quantity-summary"><?php echo e($quantity); ?></span> items)</span>
                    <span class="col" id="sum-total">Rp <?php echo number_format($sumTotal,0,',','.'); ?></span>
                </div>
                <form action="/checkout">
                    <button class="btnOrderCart">Order <span id="sum-total-btn">Rp <?php echo number_format($sumTotal,0,',','.'); ?></span></button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    function updateQty(element){
        var productId = $(element).attr("product-id");
        var qtyVal = $(element).val();
        var totalItem = 0, totalPrice = 0;
        $.ajax({
            url: "/updateProduct",
            method: "POST",
            data: {
                'id': productId,
                'qty': qtyVal,
                '_token': "<?php echo e(csrf_token()); ?>",
                '_method' : "PUT"
            },
            error: function(e) {
                // alert('Error dalam checkout cart');
            },
            success:function (e){
                $('.input-qty').each(function (){
                    var rowQty  = $(this).val();
                    var rowPrice = $(this).attr('price');
                    totalItem += parseInt(rowQty);
                    totalPrice += parseInt(rowQty) * rowPrice;
                });

                var totalPriceConverted = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0, maximumFractionDigits: 0, }).format(totalPrice);
                document.getElementById('quantity-summary').innerHTML = totalItem;
                document.getElementById('sum-total').innerHTML = totalPriceConverted
                document.getElementById('sum-total-btn').innerHTML = totalPriceConverted;
                },
            complete : function(e) {
            }
        })
    }
</script>
</html>
<?php /**PATH C:\xampp\htdocs\HireMe\resources\views//checkout/mycart.blade.php ENDPATH**/ ?>