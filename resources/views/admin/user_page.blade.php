@extends('admin.layout.site', ['title' => 'Пользователь'])
@section('content')

    <form method="get" action="{{ route('admin.requests') }}">
        <input hidden name="filterByStatus" value="all" class="form-control" id="exampleFormControlInput1">
        <input hidden name="filterByDate" value="desc" class="form-control" id="exampleFormControlInput1">
        <button type="submit" class="btn btn-link m-5 p-0">Вернуться</button>
    </form>

    <div class="m-5">

        @if($userData->status === \App\Models\Request::STATUS_PENDING)
            <h5 class="text-warning">Ожидает ответ</h5>
        @elseif($userData->status === \App\Models\Request::STATUS_ANSWER)
            <h5 class="text-success">Завершено {{ date('H:i d.m.Y', strtotime($userData->updated_at)) }}</h5>
        @endif

        <h3 class="text-secondary">Пользователь: {{ $userData->name }}</h3>
        <h3 class="text-secondary">Почта: {{ $userData->email }}</h3>
        <h3 class="text-secondary">Дата: {{ date('H:i d.m.Y', strtotime($userData->created_at)) }}</h3>

        <br>

        <h5 class="text-secondary mt-3">Заголовок: </h5>
        <h5>{{ $userData->title }}</h5>

        <h5 class="text-secondary mt-3">Описание: </h5>
        <h5>{{ $userData->description }}</h5>

        <h5 class="text-secondary mt-3">Ответ: </h5>
        @if($userData->answer === '' || $userData->answer === null)
                <form
                method="post"
                action="
                {{ route('admin.request', [
                    'user_id' => $userData->user_id,
                    'request_id' => $userData->request_id,
                    'answer' => $userData->answer
                ]) }}
                "
                >
                    @method('PUT')
                    @csrf
                    <input hidden name="request_id" value="{{ $userData->request_id }}" class="form-control" id="exampleFormControlInput1">
                    <input hidden name="user_id" value="{{ $userData->user_id }}" class="form-control" id="exampleFormControlInput1">
                    <label for="exampleFormControlTextarea1"></label>
                    <textarea name="answer" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Ответить</button>
                </form>
        @else
            <h5 class="">{{ $userData->answer }}</h5>
        @endif

    </div>

@endsection