<nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
    <a class="navbar-brand" href="/marketpage"><img
            src="<?php echo e(\Illuminate\Support\Facades\URL::asset('asset/HireMe 1 - Black Transparent.png')); ?>" id="hireme-logo"></a>
    <form action="/marketpage/search-item" class="d-flex justify-content-between search-bar-marketplace">
        <input type="text" name="query" id="search-input" placeholder='Try "Pizza Photographer"'>
        <div>
            <button type="submit" class="search-submit"><i class="icon-search" style="font-size: 2.4rem"></i></button>
        </div>
    </form>

    <div class="flex-fill profile-menu align-items-center d-flex justify-content-between">
        <form action="/switch-to-seller" class="d-flex flex-fill align-items-center" method="get">
            <button class="btnSwitchRole font-weight-bold" style="font-size: 1.4rem" type="submit">Switch to
                Seller
            </button>
        </form>
        <div class="cart-menu d-flex" style="align-items: center">
            <a href="/cart" class="d-flex flex-fill" style="cursor: pointer">
                <span class="iconify" data-icon="la:shopping-cart" style="font-size: 32px"></span>
                <div style="font-size: 1.4rem; margin-top: 0.4em">Cart</div>
            </a>
        </div>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link d-flex" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   style="align-items: center">
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
                    <div>
                        <?php if(auth()->guard()->check()): ?>
                            <span
                                style="
                                    display: block;
                                    width: 100px;
                                    font-weight: 700;
                                    overflow: hidden;
                                    white-space: nowrap;
                                    text-overflow: ellipsis;
                                    font-size: 1.4rem ;
                                    padding-left:1em">
                                <?php echo e(auth()->user()->name); ?>

                            </span>
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

<nav class="navbar d-flex justify-content-center category-navbar">
    <ul>
        <?php for($i=0;$i<count($categories);$i++): ?>
            <li><a href="/category/<?php echo e($categories[$i]->id); ?>" class="category-link"><?php echo e($categories[$i]->name); ?></a></li>
        <?php endfor; ?>
    </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\HireMe\resources\views/layout/navbar_marketplace_authuser.blade.php ENDPATH**/ ?>