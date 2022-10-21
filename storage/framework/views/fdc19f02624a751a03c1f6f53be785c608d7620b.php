<?php $__env->startSection('content'); ?>

    <table class="table m-5">
        <thead>
        <form method="get" action="<?php echo e(route('admin.requests')); ?>">
            <?php echo csrf_field(); ?>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">
                    <select name="filterByStatus" class="form-select" aria-label="Default select example">
                        <option value="all" selected>Все</option>
                        <option value="pending">Ожидает ответ</option>
                        <option value="answer">Завершено</option>
                    </select>
                </th>
                <th scope="col">
                    <select name="filterByDate" class="form-select" aria-label="Default select example">
                        <option value="asc" selected>Выберите значение</option>
                        <option value="desc">По убыванию</option>
                        <option value="asc">По возрастанию</option>
                    </select>
                </th>
                <th scope="col">
                    <button type="submit" class="btn btn-link m-0 p-0">Фильтр</button>
                </th>
            </tr>
        </form>

        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"> <?php echo e($request->id); ?> </th>
            <td><?php echo e($request->title); ?></td>

            <?php if($request->status === \App\Models\Request::STATUS_PENDING): ?>
                <td class="text-warning">Ожидает ответ</td>
            <?php elseif($request->status === \App\Models\Request::STATUS_ANSWER): ?>
                <td class="text-success">Завершено <?php echo e(date('H:i d.m.Y', strtotime($request->updated_at))); ?></td>
            <?php endif; ?>

            <td><?php echo e(date('H:i d.m.Y', strtotime($request->created_at))); ?></td>
            <td>
                <form method="get" action="<?php echo e(route('admin.user')); ?>">
                    <button name="request_id" value="<?php echo e($request->id); ?>" type="submit" class="btn btn-link m-0 p-0">Открыть заявку</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.site', ['title' => 'Admin Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\div-test-app\resources\views/admin/requests.blade.php ENDPATH**/ ?>