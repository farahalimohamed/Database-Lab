<!-- resources/views/posts/edit.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1>Edit Post</h1>

        <form action="<?php echo e(route('posts.update', $post->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo e($post->title); ?>" required>
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body" rows="5" required><?php echo e($post->body); ?></textarea>
            </div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/posts/edit.blade.php ENDPATH**/ ?>