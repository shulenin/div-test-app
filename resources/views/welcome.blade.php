<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Главная </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="collapse navbar-collapse" id="navbar-blog">
            <!-- Этот блок расположен справа -->
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">Регистрация</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">Главная</a>
                        <a class="nav-link" href="{{ route('user.logout') }}">Выйти</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ml-4">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1>Салют! Войди или зарегестрируйся и оставь свою заявку.</h1>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    </body>
</html>
