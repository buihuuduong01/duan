<module type="admin/modules/info" history_back="true"/>


<style>
    #mw-admin-manage-users-header {
        display: flex;
    }

    #users-manage-body {
        position: relative;
    }

    #users-manage-body .mw-spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50px;
    }
</style>


<div class="card style-1 bg-light mb-3">
    <div class="card-header">
        <h5><i class="mdi mdi-account-multiple text-primary mr-3"></i> <strong><?php _e(" tài khoản "); ?></strong>
        </h5>
    </div>

    <div class="card-body pt-3" id="users-manage-body">
        <form method="GET">
            <div class="align-items-center justify-content-between mt-2" id="mw-admin-manage-users-header">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group mb-0 prepend-transparent">
                            <div class="input-group-prepend bg-white">
                                <span class="input-group-text"><i class="mdi mdi-magnify mdi-20px"></i></span>
                            </div>
                            <input type="search" value="<?php echo e($keyword); ?>" name="keyword" class="form-control" aria-label="Search" placeholder="<?php _e("Search for users"); ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary ml-2"><?php _e("Search"); ?></button>
                </div>
                <div>
                    <a href="#" class="btn btn-outline-primary icon-left btn-md js-show-filter" data-bs-toggle="collapse"
                       data-bs-target="#show-filter"><i class="mdi mdi-filter-outline"></i><?php _e('Filter'); ?></a>

                    <a href="<?php print admin_url('view:modules/load_module:users/edit-user:0'); ?>"
                       class="btn btn-primary" id="add-new-user-btn">
                        <i class="mdi mdi-account-plus mr-2"></i> <?php _e("Add user"); ?>
                    </a>
                </div>
            </div>

            <div class="manage-items mt-4" id="sort-users">
                <script>
                    $(document).ready(function () {
                        $('.js-show-filter').on('click', function () {
                            $(this).toggleClass('active');
                            if ($(this).hasClass('active')) {
                                $(this).find('i').removeClass('mdi-filter-outline').addClass('mdi-close-thick');
                            } else {
                                $(this).find('i').removeClass('mdi-close-thick').addClass('mdi-filter-outline');
                            }
                        });
                        <?php if(isset($_GET['showFilter'])): ?>
                        $('.js-show-filter').click();
                        <?php endif; ?>
                    });
                </script>

                <div class="collapse" id="show-filter">
                    <div class="bg-primary-opacity-1 rounded px-3 py-2 mb-4">
                        <div class="row d-flex">
                            <div class="col-auto">
                                <div class="row d-flex justify-content-between">

                                    <div class="col-md-4">
                                        <div>
                                            <label class="d-block mb-2"><?php _e("Role"); ?></label>

                                            <select class="selectpicker" data-style="btn-md" name="isAdmin">

                                                <option disabled="disabled"><?php _e("Select role"); ?></option>

                                                <option <?php if($isAdmin == '-1'): ?>selected="selected" <?php endif;?> value=""><?php _e("All"); ?></option>

                                                <option <?php if($isAdmin == '0'): ?>selected="selected" <?php endif;?> value="0"><?php _e("User"); ?></option>

                                                <option <?php if($isAdmin == '1'): ?>selected="selected" <?php endif;?> value="1"><?php _e("Admin"); ?></option>

                                                 <option <?php if($isAdmin == '2'): ?>selected="selected" <?php endif;?> value="0"><?php _e("Nhân viên"); ?></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                    </div>


                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">

                                <div class="text-center">
                                    <button class="btn btn-outline-primary btn-sm" name="showFilter" value="1" type="submit">
                                        Submit filters
                                    </button>
                                </div> &nbsp;&nbsp;
                                <div class="text-center">
                                    <a href="<?php echo e(route('admin.user.index')); ?>" class="btn btn-outline-primary btn-sm" type="button">
                                        Reset filters
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <div style="width:200px;float:right;text-align:right; margin-top:5px;margin-bottom:15px;">
            <label class="d-block mb-2"><?php _e("Sort By"); ?></label>
            <select class="form-control" onchange="location = this.value;">

                <option disabled="disabled"><?php _e("Select sorting"); ?></option>

                <option <?php if($orderBy == 'created_at' && $orderDirection == 'desc'): ?>selected="selected"
                        <?php endif;?> value="<?php echo e(route('admin.user.index')); ?>?orderBy=created_at&orderDirection=desc&showFilter=1"><?php _e("Users"); ?> <?php _e("[New > Old]"); ?></option>
                <option <?php if($orderBy == 'created_at' && $orderDirection == 'asc'): ?>selected="selected"
                        <?php endif;?> value="<?php echo e(route('admin.user.index')); ?>?orderBy=created_at&orderDirection=asc&showFilter=1"><?php _e("Users"); ?> <?php _e("[Old > New]"); ?></option>

            </select>
        </div>

        <style>
            .mw-admin-users-manage-table td,
            .mw-admin-users-manage-table td *{
                vertical-align: middle;
            }
        </style>

        <div class="table-responsive bg-white mw-admin-users-manage-table">
            <table class="table table-hover m-0" cellspacing="0" cellpadding="0">
                <tbody>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr id="mw-admin-user-<?php echo e($user->id); ?>">
                    <td>
                        <div class="img-circle-holder img-absolute w-60">
                            <img src="<?php echo e($user->avatar); ?>">
                        </div>
                    </td>

                    <td>
                        <div class="text-outline-primary font-weight-bold">
                            <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                            <?php if($user->is_admin): ?>
                                <br><small class="text-dark"><?php _e('Admin');?></small>
                                <?php else: ?>
                                <br><small class="text-dark"><?php _e('User');?></small>
                            <?php endif; ?>
                        </div>
                    </td>

                    <td>
                        <small class="text-muted d-block"><?php _e('Tài Khoản');?></small>
                        <?php echo e($user->username); ?>

                    </td>

                    <td>
                        <small class="text-muted d-block"><?php _e('Phone');?></small>
                        <?php echo e($user->phone); ?>

                    </td>

                    <td>
                        <small class="text-muted d-block"><?php _e('Email');?></small>
                        <?php echo e($user->email); ?>

                    </td>

                    <td>
                        <span class="mw-icon-check mw-registered" style="float: none"></span>
                    </td>

                    <td>

                        <a class="btn btn-outline-primary btn-sm"
                           href="<?php echo e(admin_url()); ?>view:modules/load_module:users/edit-user:<?php echo e($user->id); ?>"><?php _e('xửa');?></a>
                    </td>

                    <!--  <td>

                         <a class="btn btn-outline-danger btn-sm" href="<?php echo e(admin_url()); ?>action:delete-user/<?php echo e($user->id); ?>"><?php _e('xóa');?></a>
                    </td> -->


                </tr>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>


        <div class="d-flex">
            <div class="mx-auto">
                <?php echo $users->links("pagination::bootstrap-4"); ?>
            </div>
        </div>

        <div class="text-right mt-3">
            <?php if($users->count() > 0): ?>
                <a href="<?php echo e($exportUrl); ?>" class="btn btn-outline-success btn-sm">
                    <i class="mdi mdi-download"></i>
                    <?php if(isset($_GET['showFilter'])): ?>
                        <?php _e("Export"); ?> <?php echo e($users->count()); ?> <?php if($users->count()==1): ?> <?php _e("user"); ?> <?php else: ?> <?php _e("users"); ?> <?php endif; ?>
                    <?php else: ?>
                        <?php _e("Export all"); ?>
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php /**PATH C:\duan\src\MicroweberPackages\User/resources/views/admin/users/index.blade.php ENDPATH**/ ?>