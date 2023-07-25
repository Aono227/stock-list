@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>お疲れ様です！</h1>
@stop

@section('content')
    <p>店舗にある食材、包材、消耗品を入力してください。</p>
    <a href="{{ url('items/add') }}" class="btn btn-default">在庫登録</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>種別</th>
                <th>詳細</th>
                <th>個数</th>
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
            </tr>
            @endforeach
            {{ $items->links() }}
        </tbody>
    </table>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <!-- <script>
        //現在の時間を取得する
        $const hour = const hour
        const hour = new Date().getHours();
        
        //朝4時〜10時59分まで
        if(hour >= 4 && hour < 11){
        document.getElementById('greeting').textContent ="おはようございます！";
        //昼11時〜16時59分まで
        }else if(hour >=11 && hour <17){
        document.getElementById('greeting').textContent ="こんにちは！";
        //夜18時〜3時59分まで
        }else{
        document.getElementById('greeting').textContent ="こんばんは！";
        }</script> -->
@stop

