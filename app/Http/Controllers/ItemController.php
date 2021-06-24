<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Datas\ItemData;
use App\Datas\SingleItem;
class ItemController extends Controller
{
    public function index(ItemData $itemData){
        $items = $itemData->getdata();
        $total = $itemData->total;
        return view('front.index', compact('items','total'));
    }
    public function store(ItemData $itemData,Request $request){
        $itemData->additem($request);
        $items = $itemData->getdata();
        $total = $itemData->total;
        return redirect('/');
    }
}
