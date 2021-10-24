<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<h1>商品を出品</h1>
<h2>商品追加フォーム</h2>
    <form method="POST" action="<?php echo e(route('items.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div>
            <label>
                商品名：<br>
                <input type="text" name="item_name">
            </label>
        </div>
        <div>
            <label>
                商品説明：<br>
                <textarea name="comment" rows="10" cols="40"></textarea>
            </label>
        </div>
        <div>
            <label>
                価格：<br>
                <input type="text" name="price">
            </label>
        </div>
        <div>
            <label>
                カテゴリー：<br>
                <select name="category_id" size="1">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </select>
            </label>
        </div>
        <div>
            <label>
                画像を選択：
                <input type="file" name="image">
            </label>
        </div>
        <div>
            <input type="submit" value="出品">
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel_ec/resources/views/items/create.blade.php ENDPATH**/ ?>