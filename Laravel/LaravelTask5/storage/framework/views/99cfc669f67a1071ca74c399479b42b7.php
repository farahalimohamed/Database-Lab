<!-- resources/views/home.blade.php -->



<?php $__env->startSection('title', 'Home Page'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Welcome to the Home Page!</h1>
    <p>This is the content of the home page.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/users/home.blade.php ENDPATH**/ ?>