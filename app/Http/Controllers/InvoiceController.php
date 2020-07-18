<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Routing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\RandomString;
use Carbon\Carbon;
use App\Invoice;
use App\Customer;
use App\User;


class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->page_title = "Invoices";
    }
    //
    public function index(){
        $user = Auth::user();
        $collection = Invoice::where('user_id', $user->id)->orderBy('id', 'desc')->simplePaginate(10);
        return view('invoices.index', compact('collection'))->with('page_title', $this->page_title);
    }



    public function create(){
        $this->page_title = 'Create invoice';

        $random_number = new RandomString();
        /*
            UniqueWithDatabase select from database
            First parameter is the database table
            Second parameter is the database row
        */
        $this->invoice_no = $random_number->UniqueWithDatabase('invoices', 'invoice_no');
        $customers = Customer::orderBy('name', 'desc')->get();
        return view('invoices.create', compact('customers'))
                    ->with('page_title', $this->page_title)
                    ->with('invoice_no', $this->invoice_no);
    }

    public function store(InvoiceRequest $request){
        $user = Auth::user();
        $data = [
            'invoice_no' => $request->invoice_no,
            'invoice_content' => $request->invoice_content,
            'invoice_total_balance' => $request->invoice_total_balance,
            'invoice_date' => $request->invoice_date,
            'invoice_time' => Carbon::now()->format('h:i A'),
            'customer' => $request->customer,
            'created_datetime' => Carbon::now()->format('m/d/Y h:i A'),
            'created_date' => Carbon::now()->format('m/d/Y'),
            'created_time' => Carbon::now()->format('h:i A'),
            'user_id' => $user->id
        ];
        Invoice::create($data);
        return redirect('invoices')->with('success', 'Invoices have been added');
    }

    //
    public function edit(Invoice $invoice){
        $this->page_title = "Edit invoice";
        $customers = Customer::orderBy('name', 'desc')->get();
        return view('invoices.edit', compact('invoice', 'customers'))->with('page_title', $this->page_title);
    }

    public function update(Request $request, Invoice $invoice){
        $invoice->update([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber
            ]);
        return redirect()->back()->with('message', 'Invoices have been added');
    }
}
