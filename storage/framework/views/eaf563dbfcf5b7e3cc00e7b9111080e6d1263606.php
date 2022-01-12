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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'
    integrity='sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=='
    crossorigin='anonymous' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'
    integrity='sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=='
    crossorigin='anonymous' />
    <?php echo $__env->make('bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Dashboard - Update Item</title>
</head>
<body>
<?php echo $__env->make('layout.navbar_seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb mt-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" style="color: #43D06B; font-size:12px;">Seller</a></li>
            <li class="breadcrumb-item"><a href="/manageps" style="color: #43D06B; font-size:12px;">Manage Products & Services</a></li>
            <li class="breadcrumb-item active" style="font-size: 12px" aria-current="page">Update Item</li>
          </ol>
        </nav>
        <!-- /Breadcrumb -->
  </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex create-title mt-5">
                <div class="back-btn mb-4">
                    <a href="javascript:history.back()">
                        <i class="fa-solid fa-arrow-left me-2" style="font-size: 2.5rem; color:#43D06B"></i>
                    </a>
                </div>
                <h1 style="margin-left: 20px">Update Item</h1>
                <hr>
        </div>
        <form action="/form/furniture/" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-container py-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                        placeholder="Name" name="name" value="<?php echo e(old('name')); ?>">
                    
                    
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                        placeholder="Description" name="name" value="<?php echo e(old('name')); ?>">
                    
                    
                </div>

                <div class="mb-3">
                    <select class="form-select"
                        name="furniture_type_id">
                        <option value="">-Choose Category-</option>
                        
                        
                        <option value="">1</option>
                        
                        <option value="">2</option>
                        
                        
                    </select>
                    
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="price"
                        placeholder="Price" name="price" value="<?php echo e(old('price')); ?>">
                    
                    
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="image"
                        name="image" onchange="previewImage()">
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="submit-button d-flex justify-content-center">
                    <button type="submit" class="add-new-item">
                       Update Item
                    </button>
                </div>
        </div>
    </div>

  
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HireMe\resources\views/seller_side/updateitem.blade.php ENDPATH**/ ?>