<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Rules\Hankaku;

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

        $query = Item::query();

        if(!empty($keyword)) {
            $query->where('item_id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('release_date', 'LIKE', "%{$keyword}%")
                ->orWhere('status', 'LIKE', "%{$keyword}%")
                ->orWhere('jan_code', 'LIKE', "%{$keyword}%")
                ->orWhere('detail', 'LIKE', "%{$keyword}%");
        }

        $items = $query->paginate(10);
        //$items = $query->get();
        //$items = Item::Paginate(10); 
        return view('item.index', compact('items', 'keyword'));
        }

    /**
     * カテゴリー一覧
     */
    public function category($id,Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Item::query();

        if(!empty($keyword)) {
            $query->where('item_id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('release_date', 'LIKE', "%{$keyword}%")
                ->orWhere('status', 'LIKE', "%{$keyword}%")
                ->orWhere('jan_code', 'LIKE', "%{$keyword}%")
                ->orWhere('detail', 'LIKE', "%{$keyword}%");
        }
        $query->where('sub_category', '=', "$id");
        $items = $query->paginate(10);
        return view('item.index', compact('items', 'keyword'));
    }

    /**
     * 商品登録
     */
    public function create(Request $request)
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'item_id' => ['required','max:20','unique:items', new Hankaku()],
            'name' => 'required|max:100',
            'release_date' => 'required',
            'category' => 'required|max:6',
            'sub_category' => 'required|max:6',
            'type' => 'required|max:6',
            'status' => 'required|max:1',
            'jan_code' => 'required|digits:13',
            'stock' => 'required|max:5',
            'detail' => 'max:190',
        ]);

        // 商品登録
        Item::create([
            'item_id' => $request->item_id,
            'name' => $request->name,
            'release_date' => $request->release_date,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'type' => $request->type,
            'status' => $request->status,
            'jan_code' => $request->jan_code,
            'stock' => $request->stock,
            'detail' => $request->detail,
        ]);

        return redirect('/items');
    }

    /**
     * 商品詳細
     */
    public function show(Request $request, $id)
    {
        $item = Item::find($id);
        return view('item.show', compact('item'));
    }

    /**
     * 商品発注
     */
    public function order(Request $request, $id)
    {
        // バリデーション
        $this->validate($request, [
            'stock' => 'required|max:5',
        ]);
        
        // 商品発注
        $item = Item::find($id);
        $itemstock = $item->stock;
        $item->stock = $itemstock+$request->stock;
        $item->updated_at = now();
        $item->save();
        return redirect('/items/complete/'.$id);
    }

    /**
     * 商品編集
     */
    public function edit(Request $request, $id)
    {
        $item = Item::find($id);
        return view('item.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        // バリデーション
        $this->validate($request, [
            'item_id' => ['required','max:20', new Hankaku()],
            'name' => 'required|max:100',
            'release_date' => 'required',
            'category' => 'required|max:6',
            'sub_category' => 'required|max:6',
            'type' => 'required|max:6',
            'status' => 'required|max:1',
            'jan_code' => 'required|digits:13',
            'stock' => 'required|max:5',
            'detail' => 'max:190',
        ]);
        
        $item = Item::find($request->id);
        $item->item_id = $request->item_id;
        $item->name = $request->name;
        $item->release_date = $request->release_date;
        $item->category = $request->category;
        $item->sub_category = $request->sub_category;
        $item->type = $request->type;
        $item->status = $request->status;
        $item->jan_code = $request->jan_code;
        $item->stock = $request->stock;
        $item->updated_at = now();
        $item->save();
        return redirect('/items/complete/'.$id);
    }
    public function complete(Request $request, $id)
    {
        $item = Item::find($id);
        return view('item.complete', compact('item'));
    }

    /**
     * 削除処理
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/items');
    }

}

