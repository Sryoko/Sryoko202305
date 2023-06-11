@extends('home')

@section('title', '商品登録')

@section('content_header')
    <h1 class="m-3">商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <div class="card card-primary">
                <form action="{{ url('items/store') }}"method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="mb-0" for="item_id">品番</label>
                            <input type="text" class="form-control @error('item_id') is-invalid @enderror" id="item_id" name="item_id" value="{{ old('item_id') }}">

                            @error('item_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="name">品名</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" style="width: 250px;min-width :180px;">
                            <label class="mb-0" for="release_date">発売</label>
                            <input type="date" class="form-control @error('release_date') is-invalid @enderror" id="release_date" name="release_date" placeholder="2023-04-01" value="{{ old('release_date') }}">
                        
                            @error('release_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="category">カテゴリー</label>
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="" disabled selected></option>
                                <option value="1" @if(old('category')=='1') selected @endif>1：スキンケア</option>
                                <option value="2" @if(old('category')=='2') selected @endif>2：ベースメイク</option>
                                <option value="3" @if(old('category')=='3') selected @endif>3：ポイントメイク</option>
                                <option value="4" @if(old('category')=='4') selected @endif>4：その他</option>
                            </select>

                            @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="sub_category">サブカテゴリー</label>
                            <select name="sub_category" class="form-control @error('sub_category') is-invalid @enderror">
                                <option value="" disabled selected></option>
                                <option value="1" @if(old('sub_category')=='1') selected @endif>1：洗顔</option>
                                <option value="2" @if(old('sub_category')=='2') selected @endif>2：化粧水</option>
                                <option value="3" @if(old('sub_category')=='3') selected @endif>3：乳液</option>
                                <option value="4" @if(old('sub_category')=='4') selected @endif>4：美容液</option>
                                <option value="5" @if(old('sub_category')=='5') selected @endif>5：化粧下地</option>
                                <option value="6" @if(old('sub_category')=='6') selected @endif>6：ファンデーション</option>
                                <option value="7" @if(old('sub_category')=='7') selected @endif>7：コンシーラー</option>
                                <option value="8" @if(old('sub_category')=='8') selected @endif>8：ハイライト</option>
                                <option value="9" @if(old('sub_category')=='9') selected @endif>9：アイブロー</option>
                                <option value="10" @if(old('sub_category')=='10') selected @endif>10：アイシャドー</option>
                                <option value="11" @if(old('sub_category')=='11') selected @endif>11：アイライナー</option>
                                <option value="12" @if(old('sub_category')=='12') selected @endif>12：マスカラ</option>
                                <option value="13" @if(old('sub_category')=='13') selected @endif>13：リップ</option>
                                <option value="14" @if(old('sub_category')=='14') selected @endif>14：その他</option>
                            </select>

                            @error('sub_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="type">種別</label>
                            <select name="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="" disabled selected></option>
                                <option value="1" @if(old('type')=='1') selected @endif>1：定番</option>
                                <option value="2" @if(old('type')=='2') selected @endif>2：限定</option>
                            </select>
                            
                            @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="status">ステータス</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="" disabled selected></option>
                                <option value="1" @if(old('status')=='1') selected @endif>1：◯</option>
                                <option value="2" @if(old('status')=='2') selected @endif>2：終了</option>
                            </select>

                            @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="jan_code">JANコード</label>
                            <input type="number" class="form-control @error('jan_code') is-invalid @enderror" id="jan_code" name="jan_code" placeholder="数字13桁" value="{{ old('jan_code') }}">
                        
                            @error('jan_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="stock">在庫</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}">
                        
                            @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-0" for="detail">詳細</label>
                            <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" value="{{ old('detail') }}">
                        
                            @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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
