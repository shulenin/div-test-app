@extends('user.layout.site', ['title' => 'Вход'])
@section('content')

<h1>Вход в личный кабинет</h1>
<form method="post" action="{{ route('user.auth') }}">
    @csrf
    <div class="form-group mb-3">
        <label for="exampleInputEmail1">Адрес почты</label>
        <input type="email" class="form-control" name="email" placeholder="Адрес почты"
               required maxlength="255" value="{{ old('email') ?? '' }}">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="text" class="form-control" name="password" placeholder="Ваш пароль"
               required maxlength="255" value="">
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>

@endsection