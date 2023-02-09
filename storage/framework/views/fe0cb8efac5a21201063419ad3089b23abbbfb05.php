<?php
    $logo = get_option('logo', 'website');
?>
<?php if(empty($logo)): ?>
    <div>
        <h4><a href="<?php echo e(site_url()); ?>"><?php echo e(get_option('website_title', 'website')); ?></a></h4>
    </div>
<?php else: ?>
    <div class="checkout-v2-logo">
        <a href="<?php echo e(site_url()); ?>">
         <img src="<?php echo e($logo); ?>"/>
        </a>
    </div>
<?php endif; ?>

<?php echo $__env->yieldContent('logo-right-link'); ?>
<?php if (! empty(trim($__env->yieldContent('logo-right-link')))): ?>
<?php endif; ?>
<?php /**PATH C:\duan\src\MicroweberPackages\Checkout/resources/views/logo.blade.php ENDPATH**/ ?>