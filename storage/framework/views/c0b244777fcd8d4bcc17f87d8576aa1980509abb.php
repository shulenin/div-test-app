<?php $__env->startSection('content'); ?>

    <form method="get" action="<?php echo e(route('admin.requests')); ?>">
        <input hidden name="filterByStatus" value="all" class="form-control" id="exampleFormControlInput1">
        <input hidden name="filterByDate" value="desc" class="form-control" id="exampleFormControlInput1">
        <button type="submit" class="btn btn-link m-5 p-0">Вернуться</button>
    </form>

    <div class="m-5">

        <?php if($userData->status === \App\Models\Request::STATUS_PENDING): ?>
            <h5 class="text-warning">Ожидает ответ</h5>
        <?php elseif($userData->status === \App\Models\Request::STATUS_ANSWER): ?>
            <h5 class="text-success">Завершено <?php echo e(date('H:i d.m.Y', strtotime($userData->updated_at))); ?></h5>
        <?php endif; ?>

        <h3 class="text-secondary">Пользователь: <?php echo e($userData->name); ?></h3>
        <h3 class="text-secondary">Почта: <?php echo e($userData->email); ?></h3>
        <h3 class="text-secondary">Дата: <?php echo e(date('H:i d.m.Y', strtotime($userData->created_at))); ?></h3>

        <br>

        <h5 class="text-secondary mt-3">Заголовок: </h5>
        <h5><?php echo e($userData->title); ?></h5>

        <h5 class="text-secondary mt-3">Описание: </h5>
        <h5><?php echo e($userData->description); ?></h5>

        <h5 class="text-secondary mt-3">Ответ: </h5>
        <?php if($userData->answer === '' || $userData->answer === null): ?>
                <form
                method="post"
                action="
                <?php echo e(route('admin.request', [
                    'user_id' => $userData->user_id,
                    'request_id' => $userData->request_id,
                    'answer' => $userData->answer
                ])); ?>

                "
                >
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <input hidden name="request_id" value="<?php echo e($userData->request_id); ?>" class="form-control" id="exampleFormControlInput1">
                    <input hidden name="user_id" value="<?php echo e($userData->user_id); ?>" class="form-control" id="exampleFormControlInput1">
                    <label for="exampleFormControlTextarea1"></label>
                    <textarea name="answer" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Ответить</button>
                </form>
        <?php else: ?>
            <h5 class=""><?php echo e($userData->answer); ?></h5>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.site', ['title' => 'Пользователь'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\div-test-app\resources\views/admin/user_page.blade.php ENDPATH**/ ?>