<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($title); ?></h1>
    <div>
        <?php if($user->image !== ''): ?>
            <img src="<?php echo e(Storage::url($user->image)); ?>">
        <?php else: ?>
            <img src="<?php echo e(asset('images/no_image.png')); ?>">
        <?php endif; ?>
        
        <a href="<?php echo e(route('profile.edit_image')); ?>">画像を変更</a>
    </div>
    <div>
        <?php echo e($user->name); ?>さん
        <a href="<?php echo e(route('profile.edit')); ?>">プロフィール編集</a>
    </div>
    <br>
    <div>
        <dl>
            <dt>プロフィール</dt>
            <?php if($user->profile !== ''): ?>
                <dd><?php echo e($user->profile); ?></dd>
            <?php else: ?>
                <dd>プロフィールが設定されていません。</dd>
            <?php endif; ?>
        </dl>
    </div>
    <br>
    <div>
        出品数：<?php echo e($user_items); ?>

    </div>
    <div>
        <h2>購入履歴</h2>
        <?php $__empty_1 = true; $__currentLoopData = $user->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <p><?php echo e($order->item->item_name); ?> : <?php echo e($order->item->price); ?>円　出品者：<?php echo e($order->item->user->name); ?>さん</p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>購入履歴はありません</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/user/profile.blade.php ENDPATH**/ ?>