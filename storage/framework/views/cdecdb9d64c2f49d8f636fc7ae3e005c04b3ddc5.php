<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->make('bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <title>HireMe</title>
</head>

<body>
<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('layout/navbar_home_authuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('layout/navbar_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<div class="banner-outter">
    <div class="banner row">
        <div class="text-bg col-md-4">
            <div class="text-bg-container">
                <div class="heading-title">Try become a freelancer</div>
                <div class="subheading-title">
                    Earn more income by offering the market
                    what you have
                </div>

                <div class="button-join-now" id="join-now-banner">
                    <a href="https://google.com">Join now</a>
                </div>
            </div>
        </div>
        <div class="banner-bg col-md-8">
            <img src="asset/Banner.png" alt="" id="banner-bg">
        </div>
    </div>
</div>

<div class="explore-outter">
    <div class="explore">
        <h2>Explore the market</h2>
        <div class="explore-item row">
            <div class="item col-md-3">
                <a href="/category/1">
                    <div class="item-image">
                        <img src="/asset/Photograph.png" alt="">
                    </div>
                    <div class="explore-item-title">
                        <span id="item-details-title">Photograph</span>
                        <br>
                        <span id="item-details-subtitle">Products, Photographer, Photo Editor</span>
                    </div>
                </a>

            </div>
            <div class="item col-md-3">
                <a href="/category/2">
                    <div class="item-image">
                        <img src="/asset/Lifestyle.png" alt="">
                    </div>
                    <div class="explore-item-title">
                        <span id="item-details-title">Lifestyle</span>
                        <br>
                        <span id="item-details-subtitle">Online Tutoring, Education, Gaming</span>
                    </div>
                </a>
            </div>
            <div class="item col-md-3">
                <a href="/category/3">
                    <div class="item-image">
                        <img src="asset/Graphics & Design.png" alt="">
                    </div>
                    <div class="explore-item-title">
                        <span id="item-details-title">Graphics & Design</span>
                        <br>
                        <span id="item-details-subtitle">Logo & Brand Identity, Art & Illustration</span>
                    </div>
                </a>
            </div>
            <div class="item col-md-3">
                <a href="/category/4">
                    <div class="item-image">
                        <img src="asset/Video & Animation.png" alt="">
                    </div>
                    <div class="explore-item-title">
                        <span id="item-details-title">Video & Animation</span>
                        <br>
                        <span id="item-details-subtitle">Video Editing & Animated Scene</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="why-us-outter">
    <div class="why-us">
        <div class="why-us-image">
            <img src="asset/why-us.png" alt="" width="466px" height="278px" style="object-fit: cover; border-radius: 16px">
        </div>
        <div class="why-us-description">
            <h1 class="why-us-title">We bring the freelance products and services into your screen</h1>
            <div class="why-us-description-list">
                <div class="description-list">
                    <div class="icon-description-list">
                        <i class="icon-check"></i>
                    </div>
                    <div class="text-description-list">
                        <span class="text-description-title">Best budget</span>
                        <br>
                        <span>Find high quality products and services from various price range.</span>
                    </div>
                </div>
                <div class="description-list">
                    <div class="icon-description-list">
                        <i class="icon-check"></i>
                    </div>
                    <div class="text-description-list">
                        <span class="text-description-title">Secured transaction</span>
                        <br>
                        <span>In ensuring customer satisfaction, your payment will be held by HireMe until you confirm the work.</span>
                    </div>
                </div>
                <div class="description-list">
                    <div class="icon-description-list">
                        <i class="icon-check"></i>
                    </div>
                    <div class="text-description-list">
                        <span class="text-description-title">Post a request</span>
                        <br>
                        <span>Still didn’t found for what you need? Try post a request to let the sellers know what you need upfront.</span>
                    </div>
                </div>
                <div class="description-list">
                    <div class="icon-description-list">
                        <i class="icon-check"></i>
                    </div>
                    <div class="text-description-list">
                        <span class="text-description-title">24/7 technical support</span>
                        <br>
                        <span>Our support team is available to assist you anytime, anywhere.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HireMe\resources\views/index.blade.php ENDPATH**/ ?>