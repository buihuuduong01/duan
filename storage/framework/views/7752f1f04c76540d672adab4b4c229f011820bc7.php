<?php $__env->startSection('logo-right-link'); ?>
    <div class="ml-auto align-self-center">
        <a href="<?php echo e(route('checkout.contact_information')); ?>" class="btn btn-link text-end text-right"><?php echo e(_e('Back')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('steps_content'); ?>

    <?php if(isset($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $field; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo e(route('checkout.shipping_method_save')); ?>">
        <?php echo csrf_field(); ?>
        <div class="shop-cart mt-5">
            <label class="font-weight-bold control-label mb-0"><?php _e("Personal information"); ?></label>
            <small class="text-muted d-block mb-2"> <?php _e("Your information"); ?></small>

            <?php echo $__env->make('checkout::contact_information_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="shop-cart-shipping mb-3">
                 <module type="shop/shipping" class="no-settings" <?php if(isset($checkout_session['shipping_gw'])): ?> selected_provider="<?php echo e($checkout_session['shipping_gw']); ?>" <?php endif; ?> template="checkout_v2" data-store-values="true" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 js-checkout-continue"><?php echo e(_e('Continue')); ?></button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('checkout::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\duan\src\MicroweberPackages\Checkout/resources/views/shipping_method.blade.php ENDPATH**/ ?>