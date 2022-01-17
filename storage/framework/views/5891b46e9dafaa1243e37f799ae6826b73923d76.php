<nav class="navbar navbar-expand-lg navbar-light  d-flex justify-content-between">
    <div class="d-flex justify-content-between align-items-center align-middle">
        <a class="navbar-brand mr-5" href="/marketpage"><img
            src="<?php echo e(\Illuminate\Support\Facades\URL::asset('asset/HireMe 1 - Black Transparent.png')); ?>" id="hireme-logo">
        </a>

        <div class="nav-item d-flex align-middle" style="align-items: center">
            <a href="/dashboard" class="nav-link d-flex flex-fill align-items-center" style="cursor: pointer">
                <div style="font-size: 1.4rem; color: black">Dashboard</div>
             </a>
             <a href="/manageps" class="nav-link d-flex flex-fill align-items-center" style="cursor: pointer">
                <div class="" style="font-size: 1.4rem; color: black">Manage Products & Services</div>
             </a>
        </div>
    </div>

        <div class="d-flex justify-content-between align-items-center align-middle">
            <div class="btn-role d-flex align-middle" style="align-items: center">
                 <form action="/switch-to-buyer" class="d-flex flex-fill align-items-center">
                    <button class="btnSwitchRole font-weight-bold" style="font-size: 1.4rem" type="submit">Switch to Buyer</button>
                </form>
            </div>

        <div class="flex-fill profile-menu align-items-center d-flex">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" style="align-items: center">
                        <img
                            src=<?php echo e(\Illuminate\Support\Facades\Storage::url(auth()->user()->profile_picture)); ?>

                            width=36px
                            height=36px
                            style=
                            "object-fit: cover;
                 border-radius: 100px;
                 box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
                "
                        >
                        <div style="color: black">
                            <?php if(auth()->guard()->check()): ?>
                                <span
                                    style="font-size: 1.4rem ;font-weight: 700; padding-left: 0.8em"><?php echo e(auth()->user()->username); ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li lass="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>

                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\HireMe\resources\views/layout/navbar_seller.blade.php ENDPATH**/ ?>