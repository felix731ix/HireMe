<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/layout/navbar_marketplace.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/fontello.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/payment/payment.css')); ?>">
    <?php echo $__env->make('bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Checkout</title>
</head>
<body>
<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('layout/navbar_marketplace_authuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('layout/navbar_marketplace', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<section class="container" style="padding: 13em 15em">
    <div class="modal-checkout">
        <h1>Checkout</h1>
        <form action="/success" method="POST">
            <?php echo csrf_field(); ?>
            <div class="payment-details">
                <span>Total Price</span>
                <h2>Rp <?php echo number_format($sumTotal,0,',','.'); ?></h2>
            </div>
            <div style="margin: 34px 0">
                <div class="label">
                    <label>Card Number</label>
                </div>
                <input id="cardNumber <?php $__errorArgs = ['card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="card_number" style="text-align: left" type="text" class="input-field" onkeypress="return formats(this, event)" onkeyup="return numberValidation(event)">
            </div>
            <div class="row justify-content-between">
                <div class="col-4">
                    <div class="label">
                        <label>Expiration Date</label>
                    </div>
                    <div class="row" style="align-items: center; text-align: center">
                        <div class="col"><input id="cardMonth" name="expiration_month" type="text" onchange="limit(this, this.value)" maxlength="2" class="input-field"></div>
                        <span style="font-size: 2.4rem">/</span>
                        <div class="col"><input id="cardYear"  name="expiration_year" type="text" onchange="limitYear(this, this.value)" maxlength="2" class="input-field"></div>
                    </div>
                </div>
                <div class="col-2" style="margin-right: 130px">
                    <div class="label">
                        <label>CVV</label>
                    </div>
                    <div class="row" style="align-items: center">
                        <div class="col"><input id="cardCVV" name="card_cvv" type="text" onchange="cvv(this, this.value)" maxlength="3" class="input-field"></div>
                    </div>
                </div>
            </div>
            <div style="margin: 24px 0">
                <?php if(session()->has('failed')): ?>
                <div style="color: var(--red); font-size: 1.4rem; margin: 16px 0">An error occurred while placing order, please verify your payment card details and try again</div>
                <?php endif; ?>
                <input type="hidden" value="<?php echo e($sumTotal); ?>" name="total_price">
                <input type="hidden" value="<?php echo e($data); ?>" name="id">
                <input type="hidden" value="<?php echo e($quantity); ?>" name="product_quantity">
                <button id="btnPay" type="submit" class="btnPay" >Pay</button>
            </div>

        </form>
    </div>
</section>
</body>
<script>
    function formats(ele, e) {
        if (ele.value.length < 19) {
            ele.value = ele.value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
            return true;
        } else {
            return false;
        }
    }

    function numberValidation(e) {
        e.target.value = e.target.value.replace(/[^\d ]/g, '');
        return false;
    }

    function limit(element, value) {
        const maxChars = 2;
        var valueLength = element.value.length;
        var value = parseInt(value);
        if (valueLength > maxChars || value > 12 || value < 1) {
            element.value = "";
        } else {
            if (value < 10) {
                element.value = "0" + value.toString();
            }
        }
    }

    function limitYear(element, value){
        const maxChars = 2;
        var valueLength = element.value.length;
        var value = parseInt(value);
        if (valueLength > maxChars || value > 99 || value < 1) {
            element.value = "";
        } else {
            if (value < 10) {
                element.value = "0" + value.toString();
            }
        }
    }

    function cvv(element, value){
        const maxChars = 3;
        var valueLength = element.value.length;
        var value = parseInt(value);

        if (valueLength > maxChars || value > 999 || value < 1) {
            element.value = "";
        }else{
            if(value < 100){
                if(value < 10){
                    element.value = "00"+value.toString();
                }
                else{
                    element.value = "0"+value.toString();
                }
            }
        }
    }

    function validateField(){
        var $cardNumber = document.getElementById('cardNumber').value;
        var $cardMonth = document.getElementById('cardMonth').value;
        var $cardYear = document.getElementById('cardYear').value;
        var $cardCVV = document.getElementById('cardCVV').value;

        if($cardNumber == "" || $cardMonth == "" || $cardYear == "" || $cardCVV == ""){
            window.alert("empt")
            window.history.back();
        }

    }
</script>
</html>
<?php /**PATH C:\xampp\htdocs\HireMe\resources\views/payment/payment_ordernow.blade.php ENDPATH**/ ?>