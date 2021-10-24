<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($title); ?></h1>
    <form method="POST" action="<?php echo e(route('profile.update', $user)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <div>
            <label>
                名前：</br>
                <input type="text" name="name" value="<?php echo e($user->name); ?>">
            </label>
        </div>
        <div>
            <label>
                プロフィール：</br>
                <textarea name="profile" rows="10" cols="40"><?php echo e($user->profile); ?></textarea>
            </label>
        </div>
        <div>
            <input type="submit" value="更新">    
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/user/profile_edit.blade.php ENDPATH**/ ?>