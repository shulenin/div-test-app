@extends('admin.layout.site', ['title' => 'Admin Dashboard'])
@section('content')

    <table class="table m-5">
        <thead>
        <form method="get" action="{{ route('admin.requests') }}">
            @csrf
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
        @foreach( $requests as $request )
        <tr>
            <th scope="row"> {{$request->id}} </th>
            <td>{{ $request->title }}</td>

            @if($request->status === \App\Models\Request::STATUS_PENDING)
                <td class="text-warning">Ожидает ответ</td>
            @elseif($request->status === \App\Models\Request::STATUS_ANSWER)
                <td class="text-success">Завершено {{ date('H:i d.m.Y', strtotime($request->updated_at)) }}</td>
            @endif

            <td>{{ date('H:i d.m.Y', strtotime($request->created_at)) }}</td>
            <td>
                <form method="get" action="{{ route('admin.user') }}">
                    <button name="request_id" value="{{ $request->id }}" type="submit" class="btn btn-link m-0 p-0">Открыть заявку</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

@endsection