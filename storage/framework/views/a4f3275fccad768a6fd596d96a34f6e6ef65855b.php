<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/layout/navbar_seller.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/fontello.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/profile/profile.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo $__env->make('bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Dashboard - Manage P S</title>
</head>

<body>
<?php echo $__env->make('layout.navbar_seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb mt-4">
            <ol class="breadcrumb" style="background-color: var(--gray_5)!important;">
                <li class="breadcrumb-item"><a href="/switch-to-seller"
                                               style="color: var(--primary_green); font-size:1.4rem;">Seller</a></li>
                <li class="breadcrumb-item active"
                    style="font-size: 14px; color: var(--primary_green); font-weight: var(--weight500)"
                    aria-current="page">Manage Products &
                    Services
                </li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

    </div>
    <div class="section-wrapper mt-5">
        <div class="3 mt-2 mb-4">
            <form action="/add-new-item" method="get">
                <button type="submit" class="add-new-item" style="color: white">
                    <span style="font-size: 2.0rem">+</span>
                    <span style="font-size: 1.6rem">Add New Item</span>
                </button>
            </form>
        </div>

        <div class="something">
            <table class="table table-striped align-middle text-center" style="font-size: 14px">
                
                <thead>
                <tr>
                    <th>No</th>
                    <th
                    =>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                
                
                <tr style="vertical-align: center">
                    <td style="padding: 20px; vertical-align: top; padding-top: 2.5em">
                        1
                    </td>
                    <td style="text-align: start; padding: 20px; width: 50%">
                        <a href="" style="color: black; display: flex">
                            <div>
                                <img src="/storage/product_img_storage/product1_1.jpg" width="56px" height="56px"
                                     style="object-fit:cover; border-radius: 8px">
                            </div>
                            <div class="item-link" style="padding-left: 1em; max-width: 400px; padding-top: 0.8em">
                                Customizeable YoutTube Wendy Susanto
                                Customizeable YoutTube Wendy Susanto
                            </div>
                        </a>
                    </td>
                    <td style="padding-top: 2em">
                        Photography
                    </td>
                    <td style="padding-top: 2em" width="20%">
                        Rp 250.000
                    </td>
                    <td style="padding-top: 2em" width="20%">
                        <a href="/update-item">
                            <button class="actionButtonSeller">Edit</button>
                        </a>
                        
                        <a href="/remove-item">
                            <button class="actionButtonSeller actionButtonSellerRemove">Remove</button>
                        </a>
                        
                    </td>
                </tr>

                
            </table>
        </div>
    </div>
</div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\HireMe\resources\views/seller_side/manageps.blade.php ENDPATH**/ ?>