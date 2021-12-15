<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/layout/navbar_marketplace.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/fontello.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/profile/profile.css')); ?>">
    <?php echo $__env->make('bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>404 | Page Not Found</title>
</head>
<div style="text-align: center; margin-top: 100px ; max-height: 100vh" >
    <img src="<?php echo e(URL::asset('asset/Illustrations/error_500.svg')); ?>" height="512px">
    <div style="margin: 64px 0">
        <div class="container" style="padding: 0 300px">
            <span style="font-size: 1.6rem">
                Something is missing, but don't worry let us try again
            </span>
        </div>
        <div style="margin: 24px">
            <form action="/marketpage">
                <button class="btnMarket">
                    Go to Marketpage
                </button>
            </form>
        </div>
    </div>
</div>
<style>
    .btnMarket, .btnMarket:hover, .btnMarket:focus {
        padding: 10px;
        background-color: var(--primary_green);
        color: white;
        font-weight: normal;
        border-radius: 8px;
        text-decoration: none;
        border: transparent;
        font-size: 1.4rem;
        outline: transparent;
        cursor: pointer;
    }
</style>

<?php /**PATH C:\xampp\htdocs\HireMe\resources\views/errors_handler/500.blade.php ENDPATH**/ ?>