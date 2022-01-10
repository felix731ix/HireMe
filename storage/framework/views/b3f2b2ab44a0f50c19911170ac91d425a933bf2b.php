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
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#" style="color: #43D06B; font-size:12px;">Seller</a></li>
              <li class="breadcrumb-item active" style="font-size: 12px" aria-current="page">Manage Products & Services</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    </div>
    <div class="section-wrapper mt-5">
        <div class="3 mt-2 mb-4">
            <a href="/add-new-item">
                <button type="submit" class="add-new-item">
                    + Add New Item
                </button>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped align-middle text-center">
                
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                
                <tr>
                    <td style="width: 5%">
                        1
                    </td>
                    <td style="width: 5%" class="text-start py-5 px-3">
                        <a href="#">
                            <img src="/storage/product_img_storage/product1_1.jpg" class="card-img-top"
                                alt="...">
                        </a>
                    </td>
                    <td style="width: 5%">
                        Customizeable YoutTube
                    </td>
                    <td price style="width: 10%">
                        Photography
                    </td>
                    <td style="width: 10%; margin: 0 auto">
                        Rp 250.000
                    </td>
                    <td style="width: 5%;">
                        <a href="/update-item">
                            <button class="btn btn-outline-success">Edit</button>
                        </a>
                        
                            <button class="btn btn-outline-danger">Delete</button>
                        
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%">
                        2
                    </td>
                    <td style="width: 5%" class="text-start py-5 px-3">
                        <a href="#">
                            <img src="/storage/product_img_storage/product1_2.jpg" class="card-img-top"
                                alt="...">
                        </a>
                    </td>
                    <td style="width: 5%">
                        Customizeable YoutTube
                    </td>
                    <td price style="width: 10%">
                        Photography
                    </td>
                    <td style="width: 10%; margin: 0 auto">
                        Rp 250.000
                    </td>
                    <td style="width: 5%;">
                        <a href="/update-item">
                            <button class="btn btn-outline-success">Edit</button>
                        </a>
                        
                            <button class="btn btn-outline-danger">Delete</button>
                        
                    </td>
                </tr>
                
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\finalprojectreinert\HireMe\resources\views/seller_side/manageps.blade.php ENDPATH**/ ?>