<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/layout/navbar_marketplace.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/fontello.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/profile/profile.css')); ?>">
    <?php echo $__env->make('bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Profile</title>
</head>
<body>
<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('layout/navbar_marketplace_authuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('layout/navbar_marketplace', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<div class="profile-title container">
    My Profile
</div>
<section class="d-flex container justify-content-between">
    <div class="user-profile text-center" style="width: 350px">
        <div class="upload-photo">
            <img src="<?php echo e(Storage::url(auth()->user()->profile_picture)); ?>" width="175" height="175"
                 style="border-radius: 100px; object-fit: cover">
        </div>
        <div class="profile-details" style="overflow: hidden">
            <form action="/update-profile" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div style="text-align: center; margin: 20px 0" method="post">
                    <input id="btnUploadProfile" class="btnUploadFileHidden" name="profile_picture" type="file">
                </div>
                <div class="d-flex" style="margin-bottom: 8px">
                    <div class="text-left" style="width: 35%">Full name</div>
                    <div class="text-right flex-shrink-1"><input name="name" class="input-field"
                                                                 style="text-align:right; width: 80%"
                                                                 value="<?php echo e(auth()->user()->name); ?>"></div>
                </div>
                <div class="d-flex justify-content-between" style="margin: 8px 0">
                    <div class="text-left">Email</div>
                    <div class="text-right"><input name="email" class="input-field" style="text-align: right"
                                                   value="<?php echo e(auth()->user()->email); ?>"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="text-left">Password</div>
                    <div class="text-right"><input name="password" type="password" class="input-field input-password"
                                                   style="text-align: right; width: 80%"
                                                   placeholder="Change Password"></div>
                </div>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error-label">
                    <span><?php echo e($message); ?></span>
                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error-label">
                    <span><?php echo e($message); ?></span>
                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error-label">
                    <span><?php echo e($message); ?></span>
                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div>
                    <button class="btnSaveChanges" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="user-menu w-75">
        <nav class="navbar-custom">
            <div class="d-flex">
                <span class="nav-item-custom nav-link" href="#">Transaction History</span>
            </div>
        </nav>
        <table class="table" style="margin-top: 24px; font-size: 1.4rem">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Date</th>
                <th scope="col">Total Payment</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php for($i=0;$i<count($listTransaction);$i++): ?>
                <?php
                    $totalPayment = 0;
                ?>
                <tr>
                    <td><?php echo e($i+1); ?></td>
                    <td><?php echo e($listTransaction[$i]->created_at); ?></td>
                    <td>
                        <?php
                            for($j=0;$j<count($listTransaction[$i]->transactionDetails);$j++){
                                $quantity = $listTransaction[$i]->transactionDetails[$j]->quantity;
                                 $productPrice = $listTransaction[$i]->transactionDetails[$j]->products->price;
                                 $totalPayment = $quantity * $productPrice;
                            }
                        ?>
                            Rp <?php echo number_format($totalPayment,0,',','.'); ?>
                    </td>
                    <td>
                        <form action="/export" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($listTransaction[$i]->id); ?>">
                            <button type="submit" style="border: transparent; outline: none; background-color: transparent; cursor: pointer">
                                <span style="font-size: 24px; background-color: var(--primary_green); color: white; padding: 3px; border-radius: 100px" class="iconify" data-icon="carbon:document-download"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endfor; ?>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HireMe\resources\views/profile/profile.blade.php ENDPATH**/ ?>