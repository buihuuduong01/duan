<?php $__env->startSection('logo-right-link'); ?>
<div class="ml-auto align-self-center">
    <a href="<?php echo e(site_url()); ?>shop" class="btn btn-link text-end text-right"><?php echo e(_e('Continue shopping')); ?></a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('steps_content'); ?>


    <form method="post" action="<?php echo e(route('checkout.contact_information_save')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mt-5 edit nodrop" field="checkout_personal_information_title">
            <h4 class="mb-0"><?php _e("Personal Information"); ?></h4>
            <small class="text-muted d-block mb-2"> <?php _e("Please fill the fields bellow"); ?></small>
        </div>

        <div class="form-group <?php if(isset($errors['first_name'])): ?> has-danger <?php endif; ?>">
            <label><?php _e("First Name"); ?></label>
            <input name="first_name" type="text" value="<?php if (!empty($checkout_session['first_name'])) echo $checkout_session['first_name']; ?>" class="form-control <?php if(isset($errors['first_name'])): ?> is-invalid <?php endif; ?>">

            <?php if(isset($errors['first_name'])): ?><span class="invalid-feedback"><?php echo e($errors['first_name'][0]); ?></span><?php endif; ?>
        </div>
        <div class="form-group <?php if(isset($errors['last_name'])): ?> has-danger <?php endif; ?>">
            <label><?php _e("Last Name"); ?></label>
            <input name="last_name" type="text" value="<?php if (!empty($checkout_session['last_name'])) echo $checkout_session['last_name']; ?>" class="form-control <?php if(isset($errors['last_name'])): ?> is-invalid <?php endif; ?>">
            <?php if(isset($errors['last_name'])): ?><span class="invalid-feedback"><?php echo e($errors['last_name'][0]); ?></span><?php endif; ?>
        </div>

        <div class="form-group <?php if(isset($errors['email'])): ?> has-danger <?php endif; ?>">
            <label><?php _e("Email"); ?></label>
            <input name="email" type="email" value="<?php if (!empty($checkout_session['email'])) echo $checkout_session['email']; ?>" class="form-control <?php if(isset($errors['email'])): ?> is-invalid <?php endif; ?>">
            <?php if(isset($errors['email'])): ?><span class="invalid-feedback"><?php echo e($errors['email'][0]); ?></span><?php endif; ?>
        </div>

        <div class="form-group <?php if(isset($errors['phone'])): ?> has-danger <?php endif; ?>">
            <label><?php _e("Phone"); ?></label>
            <input name="phone" type="text" value="<?php if (!empty($checkout_session['phone'])) echo $checkout_session['phone']; ?>" class="form-control <?php if(isset($errors['phone'])): ?> is-invalid <?php endif; ?>">
            <?php if(isset($errors['phone'])): ?><span class="invalid-feedback"><?php echo e($errors['phone'][0]); ?></span><?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-3 js-checkout-continue"><?php echo e(_e('Continue')); ?></button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('checkout::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\duan\src\MicroweberPackages\Checkout/resources/views/contact_information.blade.php ENDPATH**/ ?>