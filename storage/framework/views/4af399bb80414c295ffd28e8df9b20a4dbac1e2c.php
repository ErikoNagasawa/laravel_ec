 
<?php $__env->startSection('header'); ?>
<header>
    <ul class="header_nav">
        <li>
          <a href="<?php echo e(route('top')); ?>">
            Market
          </a>
        </li>
        <li>
          こんにちは、<?php echo e(Auth::user()->name); ?>さん！
        </li>
        <li>
          <a href="<?php echo e(route('users.show', \Auth::user()->id)); ?>">
            プロフィール
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('likes.index')); ?>">
            お気に入り一覧
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('users.exhibitions', \Auth::user()->id)); ?>">
            出品商品一覧
          </a>
        </li>
        <li>
          <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="submit" value="ログアウト">
          </form>
        </li>
    </ul>
</header>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/layouts/logged_in.blade.php ENDPATH**/ ?>