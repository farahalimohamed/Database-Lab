

<?php $__env->startSection('content'); ?>
    <h2>Create User</h2>
    
    <form action="<?php echo e(route('users.store')); ?>" method="post" class="pb-5">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create User</button>
    </form>
    <a href="<?php echo e(route('auth.google')); ?>" method="get">
        <button class="btn btn-primary">Sign In With Google</button>
    </a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/users/create.blade.php ENDPATH**/ ?>