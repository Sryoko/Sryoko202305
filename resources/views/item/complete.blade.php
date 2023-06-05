@extends('home')

@section('title', '更新完了')

@section('content_header')
    <h1 class="m-3">更新が完了しました</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                    <div class="card-body">
                    <div class="form-group mb-3">
                            <label class="mb-0" for="item_id">品番</label>
                            <input type="text" class="form-control" id="item_id" name="item_id" style="background-color: #f8fafc; border: 1px solid #ced4da;" value="{{$item->item_id}}" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="name">品名</label>
                            <input type="text" class="form-control" id="name" name="name" style="background-color: #f8fafc; border: 1px solid #ced4da;" value="{{$item->name}}" readonly>
                        </div>

                        <div class="form-group mb-3" style="width: 250px;min-width :180px;">
                            <label class="mb-0" for="release_date">発売</label>
                            <input type="date" class="form-control" id="release_date" name="release_date" style="background-color: #f8fafc; border: 1px solid #ced4da;" value="{{$item->release_date}}" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="type">種別</label>
                            <input type="text" class="form-control" id="type" name="type" style="background-color: #f8fafc; border: 1px solid #ced4da;" value="{{ $item->type =='1'? '定番':'限定' }}" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="status">ステータス</label>
                            <input type="text" class="form-control" id="status" name="status" style="background-color: #f8fafc; border: 1px solid #ced4da;" value="{{ $item->status =='1'? '○':'終了' }}" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="jan_code">JANコード</label>
                            <input type="number" class="form-control" id="jan_code" name="jan_code" style="background-color: #f8fafc; border: 1px solid #ced4da;" value="{{$item->jan_code}}" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="stock">在庫</label>
                            <input type="number" class="form-control" id="stock" name="stock" style="background-color: #f8fafc; border: 1px solid #ced4da;" value="{{$item->stock}}" readonly>
                            <!-- <input type="number" class="form-control" id="stock" name="stock" placeholder="1, 2, 3, ..."> -->
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" style="background-color: #f8fafc; border: 1px solid #ced4da;" value="{{$item->detail}}" readonly>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent">
                        <a href="/items" class="btn btn-outline-dark">戻る</a>
                    </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
@stop
