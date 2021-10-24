<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($title); ?></h1>
    
    <ul class="items">
        <?php $__empty_1 = true; $__currentLoopData = $like_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li class="item like_item">
                <div class="item_content">
                    <div class="item_body">
                        <div class="item_body_main">
                            <div class="item_body_main_img">
                                <?php if($item->image !== ''): ?>
                                    <a href="<?php echo e(route('items.show', $item)); ?>"><img src="<?php echo e(\Storage::url($item->image)); ?>"></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('items.show', $item)); ?>"><img src="<?php echo e(asset('images/no_image.png')); ?>"></a>
                                <?php endif; ?>
                            
                                <?php echo e($item->comment); ?>

                            </div>
                            <div class="item_body_info">
                                商品名：<?php echo e($item->item_name); ?>

                                <?php echo e($item->price); ?>円
                            </div>
                            <div class="item_body_category">
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
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li>商品はありません。</li>
        <?php endif; ?>
    </ul>
    <?php echo e($like_items->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/likes/index.blade.php ENDPATH**/ ?>