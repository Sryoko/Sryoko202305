@extends('home')

@section('title', '編集画面')

@section('content_header')
    <h1 class="m-3">編集画面</h1>
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
                <form action="{{ url('items/update/'.$item->id) }}"method="POST">
                    @csrf
                    <div class="card-body">
                    <div class="form-group mb-3">
                            <label class="mb-0" for="item_id">品番</label>
                            <input type="text" class="form-control" id="item_id" name="item_id" value="{{$item->item_id}}">
                            <!-- placeholder="品番" -->
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="name">品名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
                        </div>

                        <div class="form-group mb-3" style="width: 250px;min-width :180px;">
                            <label class="mb-0" for="release_date">発売</label>
                            <input type="date" class="form-control" id="release_date" name="release_date" value="{{$item->release_date}}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="category">カテゴリー</label>
                            <select name="category" class="form-control" value="{{$item->category}}">
                                <option value="" selected></option>
                                <option value="1" {{ $item->category == 1 ? 'selected' : '' }}>1：スキンケア</option>
                                <option value="2" {{ $item->category == 2 ? 'selected' : '' }}>2：ベースメイク</option>
                                <option value="3" {{ $item->category == 3 ? 'selected' : '' }}>3：ポイントメイク</option>
                                <option value="4" {{ $item->category == 4 ? 'selected' : '' }}>4：その他</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="sub_category">サブカテゴリー</label>
                            <select name="sub_category" class="form-control" value="{{$item->subcategory}}">
                            <option value="" selected></option>
                                <option value="1" {{ $item->sub_category == 1 ? 'selected' : '' }}>1：洗顔</option>
                                <option value="2" {{ $item->sub_category == 2 ? 'selected' : '' }}>2：化粧水</option>
                                <option value="3" {{ $item->sub_category == 3 ? 'selected' : '' }}>3：乳液</option>
                                <option value="4" {{ $item->sub_category == 4 ? 'selected' : '' }}>4：美容液</option>
                                <option value="5" {{ $item->sub_category == 5 ? 'selected' : '' }}>5：化粧下地</option>
                                <option value="6" {{ $item->sub_category == 6 ? 'selected' : '' }}>6：ファンデーション</option>
                                <option value="7" {{ $item->sub_category == 7 ? 'selected' : '' }}>7：コンシーラー</option>
                                <option value="8" {{ $item->sub_category == 8 ? 'selected' : '' }}>8：ハイライト</option>
                                <option value="9" {{ $item->sub_category == 9 ? 'selected' : '' }}>9：アイブロー</option>
                                <option value="10" {{ $item->sub_category == 10 ? 'selected' : '' }}>10：アイシャドー</option>
                                <option value="11" {{ $item->sub_category == 11 ? 'selected' : '' }}>11：アイライナー</option>
                                <option value="12" {{ $item->sub_category == 12 ? 'selected' : '' }}>12：マスカラ</option>
                                <option value="13" {{ $item->sub_category == 13 ? 'selected' : '' }}>13：リップ</option>
                                <option value="14" {{ $item->sub_category == 14 ? 'selected' : '' }}>14：その他</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="type">種別</label>
                            <select name="type" class="form-control" value="{{$item->type}}">
                                <option value="" selected></option>
                                <option value="1" {{ $item->type == 1 ? 'selected' : '' }}>1：定番</option>
                                <option value="2" {{ $item->type == 2 ? 'selected' : '' }}>2：限定</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="status">ステータス</label>
                            <select name="status" class="form-control" value="{{$item->status}}">
                                <option value="" selected></option>
                                <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>1：◯</option>
                                <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>2：終了</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="jan_code">JANコード</label>
                            <input type="number" class="form-control" id="jan_code" name="jan_code" placeholder="数字13桁"  value="{{$item->jan_code}}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="stock">在庫</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{$item->stock}}">
                            <!-- <input type="number" class="form-control" id="stock" name="stock" placeholder="1, 2, 3, ..."> -->
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{$item->datail}}">
                        </div>
                    </div>

                    <div class="card-footer bg-transparent">
                        <button type="submit" class="btn btn-outline-dark">更新</button>
                    </div>
                </form>
                <form action="{{ url('items/destroy/'.$item->id) }}"method="POST">
                    @csrf
                    <div class="card-footer bg-transparent">
                    <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
@stop
