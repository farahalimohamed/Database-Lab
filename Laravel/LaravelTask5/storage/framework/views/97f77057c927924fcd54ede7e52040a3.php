<!-- resources/views/posts/create.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <form action="<?php echo e(route('posts.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body" rows="5" required></textarea>
            </div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/posts/create.blade.php ENDPATH**/ ?>