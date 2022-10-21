@extends('user.layout.site', ['title' => 'Регистрация'])
@section('content')

<h1>Регистрация</h1>

<form method="post" action="{{ route('user.register') }}">
    @csrf
    <div class="form-group mb-3">
        <label for="exampleInputEmail1">Имя, Фамилия</label>
        <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
               required maxlength="255" value="{{ old('name') ?? '' }}">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1">Адрес почты</label>
        <input type="email" class="form-control" name="email" placeholder="Адрес почты"
               required maxlength="255" value="{{ old('email') ?? '' }}">
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

@endsection