<?php $__env->startSection('content'); ?>
<h1>ログイン</h1>

<form method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <div>
        <label>
            メールアドレス：
            <input type="email" name="email">
        </label>
    </div>
    
    <div>
        <label>
            パスワード：
            <input type="password" name="password">
        </label>
    </div>
    
    <input type="submit" value="ログイン">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.not_logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/auth/login.blade.php ENDPATH**/ ?>