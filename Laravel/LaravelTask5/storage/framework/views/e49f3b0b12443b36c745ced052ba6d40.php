

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1>All Posts</h1>

        <div class="row">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($post->title); ?></h5>
                            <?php if($post->image): ?>
                            <img src="<?php echo e(Storage::url($post->image)); ?>" alt="Post Image" class="img-fluid mb-3">
                            <?php endif; ?>
                            <p class="card-text"><?php echo e($post->body); ?></p>
                            <p class="card-text"><small class="text-muted">Posted by <?php echo e($post->user->name); ?> <?php echo e($post->created_at->diffForHumans()); ?></small></p>

                            <div class="btn-group" role="group">
                                <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-primary btn-sm mr-2">Update</a>

                                <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo e($posts->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/posts/index.blade.php ENDPATH**/ ?>