<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
<h1>Отправить заявку</h1>

<form method="post" action="<?php echo e(url('send-request')); ?>">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Заголовок:</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Описание:</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary mb-3">Отправить</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH C:\OpenServer\domains\div-test-app\resources\views/user/requests.blade.php ENDPATH**/ ?>