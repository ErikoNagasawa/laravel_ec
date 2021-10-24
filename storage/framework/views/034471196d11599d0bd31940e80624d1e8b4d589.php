<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<p>新規商品</p>
<ul class="items">
    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="item">
            <div>
                <?php if($item->image !== ''): ?>
                    <a href=""><img src="<?php echo e(\Storage::url($item->image)); ?>"></a>
                <?php else: ?>
                    <a href=""><img src="<?php echo e(asset('images/no_image.png')); ?>"></a>
                <?php endif; ?>
                <?php echo e($item->comment); ?>

            </div>
            <div>
                商品名：<?php echo e($item->item_name); ?>

                <?php echo e($item->price); ?>円
            </div>
            <div>
                カテゴリ：<?php echo e($item->category); ?>

                [<?php echo e($item->created_at); ?>]
            </div>
        </li>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li>商品はありません。</li>
    <?php endif; ?>
        
</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/item/top.blade.php ENDPATH**/ ?>