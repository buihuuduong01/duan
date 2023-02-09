<?php $__env->startSection('logo-right-link'); ?>
    <div class="ml-auto align-self-center">
        <a href="<?php echo e(route('checkout.shipping_method')); ?>" class="btn btn-link text-end text-right"><?php echo e(_e('Back')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('steps_content'); ?>
    <?php if(isset($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_string($field)): ?>
                        <li><?php echo $field; ?></li>
                        <?php else: ?>
                            <li>  <?php echo e(_e('Error when trying to finish the payment')); ?></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo e(route('checkout.payment_method_save')); ?>">

        <?php echo csrf_field(); ?>

        <div class="shop-cart mt-5">
            <label class="font-weight-bold control-label mb-0"><?php _e("Personal information"); ?></label>
            <small class="text-muted d-block mb-2"> <?php _e("Your information"); ?></small>

            <?php echo $__env->make('checkout::contact_information_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php
            if (!empty($checkout_session['shipping_gw'])) {
            $shippingGatewayModuleInfo = module_info($checkout_session['shipping_gw']);
            ?>

            <label class="font-weight-bold control-label mb-0 pt-2"><?php _e("Shipping method"); ?></label>
            <small class="text-muted d-block mb-2"> <?php _e("Your choice"); ?></small>

            <div class="card mb-3">
                <div class="card-body d-flex p-3">
                    <div class="col-8">


                                <?php if (isset($shippingGatewayModuleInfo['settings']['icon_class'])): ?>
                            <i class="<?php echo $shippingGatewayModuleInfo['settings']['icon_class'];?>" style="font-size:38px"></i>
                            <?php endif; ?>

                            <?php echo $shippingGatewayModuleInfo['name'];?>

                            <?php
                            $instructions = app()->shipping_manager->driver($checkout_session['shipping_gw'])->instructions($checkout_session);
                            if (!empty($instructions)) {
                                echo '<br />' . $instructions;
                            }
                            ?>


                        <?php if(!empty($checkout_session['country'])):?>
                            <br><br>
                            <?php if (!empty($checkout_session['country'])) { echo $checkout_session['country']; } ?>
                            <?php if (!empty($checkout_session['city'])) {  echo ', ' . $checkout_session['city']; } ?>
                            <?php if (!empty($checkout_session['address'])) { echo  ', ' .  $checkout_session['address']; } ?>
                            <?php if (!empty($checkout_session['zip'])) { echo  ',  ' .  $checkout_session['zip'] . '<br />'; } ?>

                            <?php if (!empty($checkout_session['other_info'])) { echo '<div class="mt-2"><i class="mdi mdi-comment"></i> ' .  $checkout_session['other_info'] . '<br /></div>'; } ?>

                        <?php endif; ?>
                    </div>

                    <div class="col-4 justify-content-end text-end text-right align-self-top px-0">
                        <a href="<?php echo e(route('checkout.shipping_method')); ?>" class="btn btn-link px-0"><?php echo e(_e('Edit')); ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
            <module type="shop/payments" <?php if(isset($checkout_session['payment_gw'])): ?> selected_provider="<?php echo e($checkout_session['payment_gw']); ?>" <?php endif; ?>  template="checkout_v2" />

            <module type="shop/checkout/terms" template="checkout_v2" class="no-settings" />
        </div>
        <button type="submit" class="btn btn-primary w-100 js-finish-your-order js-checkout-continue"> <?php echo e(_e('Complete your order')); ?></button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('checkout::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\duan\src\MicroweberPackages\Checkout/resources/views/payment_method.blade.php ENDPATH**/ ?>