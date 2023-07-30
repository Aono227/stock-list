<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\HomeController;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword'); 
        //dump($keyword);
         if(isset($keyword)){
            $items = Item::where('name', $keyword)
            ->orwhere('number',$keyword)
            ->orwhere('type',$keyword)
            ->paginate(4);
          }else{
            $items = Item::paginate(4);
          }
    
         return view('item.index', compact('keyword','items'));
            
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
                'number' => $request->number,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    /**
     * 商品削除
     */
    public function delete(Request $request)
    {
        $item = Item::find($request->id);
        $item -> delete();
    
        return redirect('/items');
    }


    /**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

   //商品編集
public function edit(Request $request, $id)
{
    $item = Item::find($id);

    return view('item.edit', [
        'items' => $item
    ]);
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $item = Item::find($request->id);
    $item->fill($request->all())->save();

    // 一覧へ戻り完了メッセージを表示
    return redirect()->route('items.index')->with('message', '編集しました');
}
}