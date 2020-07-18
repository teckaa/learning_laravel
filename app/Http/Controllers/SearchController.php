<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->page_title = "Search";
    }


    public function index(Request $request){
        $search = $request->get('search');
        $invoices = DB::table('invoices')->where('invoice_no', 'like', '%search%')->get();

        return view ('search.index', compact ('invoices'))->with('page_title', $this->page_title);

    }


}
