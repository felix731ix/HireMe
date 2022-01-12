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
    <title>Marketpage</title>
</head>
<body>
<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('layout/navbar_marketplace_authuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('layout/navbar_marketplace', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div class="search-results">
    <?php if(isset($_GET['query'])): ?>
        Search results for "<?php echo e($_GET['query']); ?>"
    <?php endif; ?>
</div>

<div class="market-type d-flex">
    <div class="active d-flex align-items-center" id="product">
        <span class="iconify" data-icon="ci:bulb"></span>
        <span>Products & Services</span>
    </div>
</div>


<section class="row-cards">
    <?php if(count($products) <= 0): ?>
        <section class="container" style="text-align: center">
            <img src="<?php echo e(URL::asset('asset/Illustrations/no_results_found.svg')); ?>" width="364px" height="364px">
            <div>
                <h2 style="margin-top: 1rem; font-weight: var(--weight700)">Oops, product not found</h2>
                <h4 style="margin:1rem 0 1rem 0; font-weight: var(--weight400)">Let's try another keywoard</h4>
                <form ACTION="/marketpage">
                    <button class="btnMarket">Change keyword</button>
                </form>
            </div>
        </section>
    <?php else: ?>
        <?php
            $counter = 0;
            $productCounter = 0;
            $remainingProduct = count($products);
        ?>
        <?php for($j=0;$j<3;$j++): ?>
            <div class="row mt-5">
                <?php for($i=$counter;$i<count($products); $i++): ?>
                    <?php if($productCounter <5): ?>
                        <div class="cards col-md-auto">
                            <a href="/marketpage/<?php echo e($products[$i]->id); ?>">
                                <img src="<?php echo e(Storage::url($products[$i]->image)); ?>" width="280px"
                                     height="270px" style="border-radius: 16px; object-fit: cover; align-items: center">
                            </a>
                            <div class="cards-details">
                                <div class="d-flex justify-content-between cards-details">
                                    <div class="flex-shrink-1"><?php echo e($products[$i]->name); ?></div>
                                    <div class="w-50 text-right">Rp <?php echo number_format($products[$i]->price,0,',','.'); ?></div>
                                </div>
                                <div>
                                    <span><?php echo e($products[$i]->user->username); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                            $counter++;
                            $productCounter++;
                        ?>
                    <?php else: ?>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php
                $remainingProduct = $remainingProduct -  $productCounter;
                $productCounter = 0;
            ?>
        <?php endfor; ?>
    <?php endif; ?>
</section>



<?php $__env->startSection('iconify'); ?>
<?php $__env->stopSection(); ?>

<script>

    function changeClass(className, classId) {
        var classNameInner = className.className;
        if (classNameInner.includes('disable')) {
            if (classId === 'product') {
                document.getElementById('service').classList.remove('active');
                document.getElementById('service').classList.add('disable');

                document.getElementById('product').classList.remove('disable');
                document.getElementById('product').classList.add('active');
            } else {
                document.getElementById('service').classList.remove('disable');
                document.getElementById('service').classList.add('active');

                document.getElementById('product').classList.remove('active');
                document.getElementById('product').classList.add('disable');
            }
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

<?php echo $__env->make('bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HireMe\resources\views/marketpage/product_page.blade.php ENDPATH**/ ?>