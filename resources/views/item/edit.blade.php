@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible">
            {{-- エラーの表示 --}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 編集画面 --}}
    <div class="card">
    <form action="{{ route('items.edit', $items->id) }}" method="post">
            @csrf @method('PUT')
            <div class="card-body">
                {{-- 商品名入力 --}}
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" pattern="[^\uFF10-\uFF19]*" class="form-control" id="name" name="name" required
                        value="{{ old('name', $items->name) }}" placeholder="商品名" />
                </div>
                {{-- 価格入力 --}}
                <div class="form-group">
                    <label for="price">種別</label>
                    <input type="text" class="form-control" id="type" name="type"
                        value="{{ old('price', $items->type) }}" placeholder="種別" />
                </div>

                <div class="form-group">
                    <label for="price">詳細</label>
                    <input type="text" class="form-control" id="detail" name="detail"
                        value="{{ old('detail', $items->detail) }}" placeholder="詳細" />
                </div>

                <div class="form-group">
                    <label for="number">個数</label>
                    <input type="text" pattern="^[1-9][0-9]*$" class="form-control" id="number" name="number"
                        value="{{ old('number', $items->number) }}" placeholder="個数(半角数字のみ)" />
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <a class="btn btn-default" href="{{ route('items.index') }}" role="button">戻る</a>
                    <div class="ml-auto">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop