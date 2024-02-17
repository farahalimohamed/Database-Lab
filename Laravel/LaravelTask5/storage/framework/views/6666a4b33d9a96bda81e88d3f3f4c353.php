

<?php $__env->startSection('content'); ?>
    <h2>User Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: <?php echo e($user->name); ?></h5>
            <p class="card-text">Email: <?php echo e($user->email); ?></p>
            <p class="card-text">Email Verified At: <?php echo e($user->email_verified_at); ?></p>
        </div>
    </div>

    <h2>User Posts</h2>
    <?php if($user->posts->count() > 0): ?>
        <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title"><?php echo e($post->title); ?></h3>
                    <?php if($post->image): ?>
                     <img src="<?php echo e(Storage::url($post->image)); ?>" alt="Post Image" class="img-fluid mb-3">
                    <?php endif; ?>
                    <p class="card-text"><?php echo e($post->body); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>No posts available for this user.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/users/show.blade.php ENDPATH**/ ?>