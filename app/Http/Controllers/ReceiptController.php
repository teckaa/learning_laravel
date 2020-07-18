<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
///use App\Receipt;

class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->page_title = "Receipts";
    }
    //
    public function index(){
        return view('receipts.index')->with('page_title', $this->page_title);
    }

    public function create(){
        $this->page_title = "Create receipt";
        return view('receipts.create')->with('page_title', $this->page_title);
    }
}
