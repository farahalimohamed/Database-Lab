

<?php $__env->startSection('content'); ?>
    <h2>Edit User</h2>
    
    <form action="<?php echo e(route('users.update', $user->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/users/edit.blade.php ENDPATH**/ ?>