@extends('adminlte::page')

@section('title', '在庫一覧')

@section('content_header')
    <h1>在庫一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">在庫一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">登録</a>
                            </div>
                        </div>
                    </div>
                </div>
        <body>
            <form action="{{ route('items.index') }}" method="GET">
                @csrf
                <input type="text" pattern="[^\uFF10-\uFF19]*" name="keyword" value="{{ $keyword }}" placeholder="名前、種別、個数(半角)"> 
                <input type="submit" value="検索">
            </form>
        </body>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>個数</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->detail }}</td>
                                        <td>{{ $item->number }}</td>
                                    <td>
                                        <form action="{{ url('items/delete') }}" method="post"
                                        onsubmit="return confirm('削除します。よろしいですか？');">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="submit" value="削除" class="btn btn-danger">
                                        </form>
                                    </td>
                                        <td><a href="{{ url('items/edit/' .  $item->id) }}" class="btn btn-success">編集</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{ $items->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
