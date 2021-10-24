<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($user->name); ?>の<?php echo e($title); ?></h1>
    <a href="<?php echo e(route('items.create')); ?>">新規出品</a>
    
    <ul class="items">
        <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li class="item">
                <div>
                    <?php if($item->image !== ''): ?>
                        <a href="<?php echo e(route('items.show', $item)); ?>"><img src="<?php echo e(\Storage::url($item->image)); ?>"></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('items.show', $item)); ?>"><img src="<?php echo e(asset('images/no_image.png')); ?>"></a>
                    <?php endif; ?>
                    <?php echo e($item->comment); ?>

                </div>
                <div>
                    商品名：<?php echo e($item->item_name); ?>

                    <?php echo e($item->price); ?>円
                </div>
                <div>
                    カテゴリ：<?php echo e($item->category->name); ?>

                    [<?php echo e($item->created_at); ?>]
                </div>
                <ul>
                    <?php if($item->isSoldOut() === true): ?>
                        <li class="sold_out">売り切れ</li>
                    <?php else: ?>
                        <li class="on_sale">出品中</li>
                    <?php endif; ?>
                </ul>
                <div>
                    <a href="<?php echo e(route('items.edit', $item)); ?>">[編集]</a>
                    <a href="<?php echo e(route('items.edit_image', $item)); ?>">[画像を変更]</a>
                </div>
                <form class="delete" method="post" action="<?php echo e(route('items.destroy', $item)); ?>">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('delete'); ?>
                  <input type="submit" value="削除">
                </form>
            </li>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li>出品している商品はありません。</li>
        <?php endif; ?>
        <?php echo e($items->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/user/exhibitions.blade.php ENDPATH**/ ?>