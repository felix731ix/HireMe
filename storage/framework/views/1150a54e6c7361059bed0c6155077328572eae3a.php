<nav class="navbar navbar-expand-lg navbar-light  d-flex justify-content-between">
    <a class="navbar-brand" href="/marketpage"><img
            src="<?php echo e(\Illuminate\Support\Facades\URL::asset('asset/HireMe 1 - Black Transparent.png')); ?>" id="hireme-logo"></a>

    <form action="/marketpage/search-item" class="d-flex justify-content-between search-bar-marketplace">
        <input type="text" name="query" id="search-input" placeholder='Try "Pizza Photographer"'>
        <div>
            <button type="submit" class="search-submit"><i class="icon-search" style="font-size: 2.4rem"></i></button>
        </div>
    </form>

    <div class="sign-join" style="font-size: 1.6rem">
        <a class="login-now" id="login-now" href="/user-login"
           style="text-decoration: none; color: black; padding: 8px 16px; margin-right: 32px; border-radius: 100px; border: solid 1px black"
        >
            Sign in
        </a>
        <a class="join-now" id="join-now" href="/user-register"
           style="padding: 8px 16px; color: white; background-color: black; border-radius: 100px; text-decoration: none">
            Join Now
        </a>
    </div>
</nav>

<nav class="navbar d-flex justify-content-center category-navbar">
    <ul>
        <?php for($i=0;$i<count($categories);$i++): ?>
            <li><a href="/category/<?php echo e($categories[$i]->id); ?>" class="category-link"><?php echo e($categories[$i]->name); ?></a></li>
        <?php endfor; ?>
    </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\finalprojectreinert\HireMe\resources\views/layout/navbar_marketplace.blade.php ENDPATH**/ ?>