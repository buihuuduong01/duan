<?php if (! empty(trim($__env->yieldContent('steps_content')))): ?>
<div class="col-lg-6 col-12 order-lg-0 order-1">
    <div class="col-lg-8 col checkout-v2-left-column float-lg-right p-xl-5 p-md-3 p-3">

        <div class="d-flex">
            <?php echo $__env->make('checkout::logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php echo $__env->yieldContent('steps_content'); ?>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\duan\src\MicroweberPackages\Checkout/resources/views/steps_layout.blade.php ENDPATH**/ ?>