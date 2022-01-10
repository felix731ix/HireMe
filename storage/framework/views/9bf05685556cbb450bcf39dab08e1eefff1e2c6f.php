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
    <title>Dashboard - Seller</title>
</head>
<body>
<?php echo $__env->make('layout.navbar_seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb mt-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#" style="color: #43D06B; font-size:12px;">Seller</a></li>
              <li class="breadcrumb-item active" style="font-size: 12px" aria-current="page">Dashboard</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo e(Storage::url(auth()->user()->profile_picture)); ?>" class="rounded-circle" width="50">
                            <h4 style="padding: 10px 0px 0px 10px"><?php echo e(auth()->user()->name); ?></h4>
                        </div>
                        <div class="d-flex rating" style="padding: 10px 0px 0px 10px">
                            <span class="fa fa-star checked" style="padding: 2px 5px 0px 0px"></span>
                            <h6>4.9</h4>
                        </div>
                    </div>

                    <div class="mt-3">
                      <hr>
                      <small>Chat Response Rate</small>
                      <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">89%</div>
                      </div>
                      <small>Order Response Rate</small>
                      <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 96%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">96%</div>
                      </div>
                      <small>Order Completion</small>
                      <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100">100%</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="1 mt-3" style="font-size: 12px">
                        Earnings
                    </div>
                    <div class="2 mt-2" style="font-weight: bold; font-size:22px">
                        Rp 120.000
                    </div>
                    <div class="3 mt-2 mb-4">
                        <button type="submit" class="withdraw-earnings">
                            Withdraw
                        </button>
                    </div>
                  </div>

              </div>
            </div>
            <div class="col-md-8">
                <div class="user-menu">
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
                        
                        </tbody>
                    </table>
                </div>

              



            </div>
          </div>

        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\finalprojectreinert\HireMe\resources\views/seller_side/dashboard.blade.php ENDPATH**/ ?>