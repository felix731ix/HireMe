<div class="top-head">
    <div class="navbar row">
        <div class="company-logo">
            <img src="/asset/Hireme_logo.png" id="hireme-logo">
        </div>
        <div class="flex-fill profile-menu align-items-center d-flex">
            <img
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80"
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
                    <span style="font-size: 1rem ;font-weight: 600; padding-left: 0.8em"><?php echo e(auth()->user()->name); ?></span>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <div class="title">
        <div id="freelance">
            freelance
        </div>
        <div id="product-service">
            product and services marketplace
        </div>
    </div>
    <div class="search-bar">
        <form action="/marketpage/search-item" style="padding-left: 8px">
            <input type="text" name="query" id="search-input" placeholder='Try "Pizza Photographer"'>
            <button type="submit" class="search-submit"><i class="icon-search"></i></button>
        </form>
    </div>
</div>
<?php /**PATH D:\FILE TI\Semester 5\Web Programming\LS01\Tugas yang belum submit\HireMe\resources\views/layout/navbar_home_authuser.blade.php ENDPATH**/ ?>