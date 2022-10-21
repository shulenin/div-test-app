@extends('user.layout.site', ['title' => 'Dashboard'])
@section('content')

<h1>Отправить заявку</h1>

<form method="post" action="{{ route('user.request') }}">
    @csrf
    <input hidden name="user_id" value="{{ $userData->id }}" class="form-control" id="exampleFormControlInput1">
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

    @foreach( $requests as $request )
        <div class="card mb-3 text-bg-light">
            <div class="card-body">
                <h5 class="card-title">
                    Заголовок: {{ $request->title }}
                    <form method="post" action="{{ route('user.delete') }}">
                        @csrf
                        <button name="request_id" value="{{ $request->id }}" type="submit" class="btn btn-link m-0 p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </button>
                    </form>
                </h5>
                <p class="text-secondary">{{ date('H:i d.m.Y', strtotime($request->created_at)) }}</p>
                @if($request->status === \App\Models\Request::STATUS_PENDING)
                    <p class="text-warning">Ожидает ответ</p>
                @elseif($request->status === \App\Models\Request::STATUS_ANSWER)
                    <p class="text-success">Завершено {{ date('H:i d.m.Y', strtotime($request->updated_at)) }}</p>
                @endif
                <p class="card-text">Описание: {{ $request->description }}</p>
            </div>
        </div>
    @endforeach

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

@endsection