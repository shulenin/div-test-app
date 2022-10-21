<?php $__env->startSection('content'); ?>

<h1>Регистрация</h1>

<form method="post" action="<?php echo e(route('user.register')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group mb-3">
        <label for="exampleInputEmail1">Имя, Фамилия</label>
        <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
               required maxlength="255" value="<?php echo e(old('name') ?? ''); ?>">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1">Адрес почты</label>
        <input type="email" class="form-control" name="email" placeholder="Адрес почты"
               required maxlength="255" value="<?php echo e(old('email') ?? ''); ?>">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1">Придумайте пароль</label>
        <input type="text" class="form-control" name="password" placeholder="Придумайте пароль"
               required maxlength="255" value="">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1">Введите еще раз</label>
        <input type="text" class="form-control" name="password_confirmation"
               placeholder="Пароль еще раз" required maxlength="255" value="">
    </div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.site', ['title' => 'Регистрация'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\div-test-app\resources\views/user/register.blade.php ENDPATH**/ ?>