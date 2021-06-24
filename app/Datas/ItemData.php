<?php

namespace App\Datas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ItemData extends SingleItem {

    public $datas;
    private $item;
    public $total;

    public function __construct(){
        $this->total = 0;
        $single = new SingleItem;
        // dd($single);
        $this->datas = [];
        $json = file_get_contents('items.json');
        $items = json_decode($json,true);
        if ($items == null || empty($items)){
            return [];
        }
        foreach ($items as $key1 => $value1) {
                // dd($items[$key1]);
                $single->Name = $items[$key1]['Name'];
                $single->Quantity = $items[$key1]['Quantity'];
                $single->Price = $items[$key1]['Price'];
                $single->Dated = $items[$key1]['Dated'];
                $single->Total = $items[$key1]['Total'];
                $this->total += $single->Total;
                array_push($this->datas, $single);
        }
        // dd($this->datas);
       
    }
    public function additem(Request $request){
        $total = $request->quantity * $request->price;
        $singleItem = new SingleItem;
        $singleItem->Name = $request->name;
        $singleItem->Quantity = $request->quantity;
        $singleItem->Price = $request->price;
        $singleItem->Dated = Carbon::now();
        $singleItem->Total = $total;
        array_push($this->datas, $singleItem);
        $file = fopen('items.json', 'w');
        fwrite($file, json_encode($this->datas));
        fclose($file);
    }
    public function getdata(){
        return $this->datas;
    }
}