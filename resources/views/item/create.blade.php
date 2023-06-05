@extends('home')

@section('title', '商品登録')

@section('content_header')
    <h1 class="m-3">商品登録</h1>
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
                <form action="{{ url('items/store') }}"method="POST">
                    @csrf
                    <div class="card-body">
                    <div class="form-group mb-3">
                            <label class="mb-0" for="item_id">品番</label>
                            <input type="text" class="form-control" id="item_id" name="item_id">
                            <!-- placeholder="品番" -->
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="name">品名</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group mb-3" style="width: 250px;min-width :180px;">
                            <label class="mb-0" for="release_date">発売</label>
                            <input type="date" class="form-control" id="release_date" name="release_date" placeholder="2023-04-01">
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="category">カテゴリー</label>
                            <select name="category" class="form-control">
                                <option value="" disabled selected></option>
                                <!-- <option value="" disabled selected>カテゴリーを選択してください</option> -->
                                <option value="1">1：スキンケア</option>
                                <option value="2">2：ベースメイク</option>
                                <option value="3">3：ポイントメイク</option>
                                <option value="4">4：その他</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="sub_category">サブカテゴリー</label>
                            <select name="sub_category" class="form-control">
                                <option value="" disabled selected></option>
                                <option value="1">1：洗顔</option>
                                <option value="2">2：化粧水</option>
                                <option value="3">3：乳液</option>
                                <option value="4">4：美容液</option>
                                <option value="5">5：化粧下地</option>
                                <option value="6">6：ファンデーション</option>
                                <option value="7">7：コンシーラー</option>
                                <option value="8">8：ハイライト</option>
                                <option value="9">9：アイブロー</option>
                                <option value="10">10：アイシャドー</option>
                                <option value="11">11：アイライナー</option>
                                <option value="12">12：マスカラ</option>
                                <option value="13">13：リップ</option>
                                <option value="14">14：その他</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="type">種別</label>
                            <select name="type" class="form-control">
                                <option value="" disabled selected></option>
                                <option value="1">1：定番</option>
                                <option value="2">2：限定</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="status">ステータス</label>
                            <select name="status" class="form-control">
                                <option value="" disabled selected></option>
                                <option value="1">1：◯</option>
                                <option value="2">2：終了</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="jan_code">JANコード</label>
                            <input type="number" class="form-control" id="jan_code" name="jan_code" placeholder="数字13桁">
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="stock">在庫</label>
                            <input type="number" class="form-control" id="stock" name="stock">
                            <!-- <input type="number" class="form-control" id="stock" name="stock" placeholder="1, 2, 3, ..."> -->
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail">
                        </div>
                    </div>

                    <div class="card-footer bg-transparent">
                        <button type="submit" class="btn btn-outline-dark">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
@stop
