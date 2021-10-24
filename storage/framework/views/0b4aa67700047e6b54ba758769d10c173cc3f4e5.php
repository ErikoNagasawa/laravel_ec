<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($title); ?></h1>
    <dl>
        <dt>商品名</dt>
        <dd><?php echo e($item->item_name); ?></dd>
    </dl>
    <dl>
        <dt>画像</dt>
        <dd>
            <?php if($item->image !== ''): ?>
                <img src="<?php echo e(\Storage::url($item->image)); ?>">
            <?php else: ?>
                <img src="<?php echo e(asset('images/no_image.png')); ?>">
            <?php endif; ?>
        </dd>
    </dl>
    <dl>
        <dt>カテゴリ</dt>
        <dd><?php echo e($item->category->name); ?></dd>
    </dl>
    <dl>
        <dt>価格</dt>
        <dd><?php echo e($item->price); ?></dd>
    </dl>
    <dl>
        <dt>説明</dt>
        <dd><?php echo e($item->comment); ?></dd>
    </dl>
    <form method="post" action="<?php echo e(route('items.finish', $item)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <input type="submit" value="内容を確認し、購入する">
    </form>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/items/confirm.blade.php ENDPATH**/ ?>