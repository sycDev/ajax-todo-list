<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ListController extends Controller
{
    public function index()
    {
        return view('list');
    }
    
    public function create(request $request)
    {
        $item = new Item;
        $item->item = $request->text;
        $item->save();
        return 'Done';
    }
}
