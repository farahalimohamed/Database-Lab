

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Welcome to my page!</h1>
    <p>This is the content of the page.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/app.blade.php ENDPATH**/ ?>