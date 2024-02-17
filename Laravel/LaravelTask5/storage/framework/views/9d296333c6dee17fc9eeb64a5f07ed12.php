<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h4 class="mr-5 mt-2">Laravel</h4>
    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Home</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Users Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Users
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- Users List Link -->
                    <a class="dropdown-item <?php echo e(Request::is('users/list') ? 'active' : ''); ?>" href="<?php echo e(route('users.list')); ?>">Users List</a>

                    <!-- New User Link -->
                    <a class="dropdown-item <?php echo e(Request::is('users/new') ? 'active' : ''); ?>" href="<?php echo e(route('users.new')); ?>">New User</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH D:\xxamp\htdocs\LaravelTask2\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>