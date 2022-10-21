<?php $__env->startSection('content'); ?>

<h1>Вход в личный кабинет</h1>
<form method="post" action="<?php echo e(route('user.auth')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group mb-3">
        <label for="exampleInputEmail1">Адрес почты</label>
        <input type="email" class="form-control" name="email" placeholder="Адрес почты"
               required maxlength="255" value="<?php echo e(old('email') ?? ''); ?>">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="text" class="form-control" name="password" placeholder="Ваш пароль"
               required maxlength="255" value="">
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.site', ['title' => 'Вход'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\div-test-app\resources\views/user/login.blade.php ENDPATH**/ ?>