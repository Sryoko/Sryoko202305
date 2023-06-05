@extends('home')

@section('title', '商品一覧')

@section('content_header')
<h1 class="m-3">商品一覧</h1>

@stop


@section('content')
    <!-- //* 検索機能ここから *// -->
    <div>
        <form action="{{ route('index') }}" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}" autofocus>
            <input type="submit" value="検索">
        </form>
    </div>
    <!-- //*検索機能ここまで*// -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th class="px-2 border-right border-light" style="background-color: #D8D9DA;">品番</th>
                                <th class="px-2 border-right border-light" style="background-color: #D8D9DA;">品名</th>
                                <th class="px-2 border-right border-light" style="background-color: #D8D9DA;">発売</th>
                                <th class="px-2 border-right border-light" style="background-color: #D8D9DA;">種別</th>
                                <th class="px-2 border-right border-light" style="background-color: #D8D9DA;">ステータス</th>
                                <th class="px-2 border-right border-light" style="background-color: #D8D9DA;">JAN</th>
                                <th class="px-2 border-right border-light" style="background-color: #D8D9DA;">在庫</th>
                                <th class="px-0 pl-0  border-left border-light" style="background-color: #D8D9DA;">発注</th>
                                <th class="pl-0 pr-2 border-left border-light" style="background-color: #D8D9DA;">編集</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="px-2 align-middle">{{ $item->item_id }}</td>
                                    <td class="text-left px-2 align-middle">{{ $item->name }}</td>
                                    <td class="px-2 align-middle">{{ $item->release_date }}</td>
                                    <td class="px-2 align-middle">{{ $item->type =='1'? '定番':'限定' }}</td>
                                    <td class="px-2 align-middle">{{ $item->status =='1'? '○':'終了' }}</td>
                                    <td class="px-2 align-middle">{{ $item->jan_code }}</td>
                                    <td class="px-2 align-middle">{{ $item->stock }}</td>
                                    <td class="px-1 py-1 align-middle" style="width: 80px;"><a href="{{ url('/items/show/'.$item->id) }}" class="btn btn-default px-3 py-1">発注</a></td>
                                    <td class="pl-0 py-1 pr-2 align-middle" style="width: 80px;"><a href="{{ url('/items/edit/'.$item->id) }}" class="btn btn-default px-3 py-1">編集</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $items->links() }}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
