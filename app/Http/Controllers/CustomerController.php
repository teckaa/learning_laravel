<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Routing;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use App\Customer;
use App\User;
use Dotenv\Result\Result;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->page_title = "Customers";
    }
    //

    public function index(Request $request){
        $user = Auth::user();

        $q =  $request->input('q');
        if($q!=""){
            $collections = Customer::where(function ($query) use ($q){
                $query->where('name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%')
                    ->orWhere('phonenumber', 'like', '%'.$q.'%');
            })
            ->simplePaginate(10);
            $collections->appends(['q' => $q]);
        }
        else{
            $collections = Customer::simplePaginate(10);
        }
        // $collections = Customer::where('user_id', 1)->get();
        return view('customers.index', ['collection'=>$collections, 'trash'=> false ])->with('page_title', $this->page_title);
    }


    public function create(){
        $this->page_title = "Create customer";
        return view('customers.create')->with('page_title', $this->page_title);
    }

    public function store(CustomerRequest $request, Customer $customer){
        $user = Auth::user();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'phonenumber' => $request->phonenumber,
            'created_datetime' => Carbon::now()->format('m/d/Y h:i A'),
            'created_date' => Carbon::now()->format('m/d/Y'),
            'created_time' => Carbon::now()->format('h:i A'),
            'user_id' => $user->id
        ];
        Customer::create($data);
        return redirect('customers')->with('success', 'Customers have been added');
    }

    //
    public function edit(Customer $customer){
        $this->page_title = "Edit customer";
        $user = Auth::user();
        return view('customers.edit', compact('customer'))->with('page_title', $this->page_title);
    }

    public function update(CustomerRequest $request, Customer $customer){
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'country' => $request->country
            ]);
        return redirect()->back()->with('success', 'Update succesful');
    }

    public function delete(Customer $customer){
        $customer->delete();
        return redirect()->back()->with('success', 'Item have been deleted');
    }

    public function trash(Request $request){
        $this->page_title = "Customers Trash";
        $user = Auth::user();

        $q =  $request->input('q');
        if($q!=""){
            $collections = Customer::where(function ($query) use ($q){
                $query->where('name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%')
                    ->orWhere('phonenumber', 'like', '%'.$q.'%');
            })
            ->onlyTrashed()->orderBy('deleted_at', 'asc')->simplePaginate(10);
            $collections->appends(['q' => $q]);
        }
        else{
            $collections = Customer::onlyTrashed()->orderBy('deleted_at', 'asc')->simplePaginate(10);
        }
         return view('customers.index', ['collection'=>$collections, 'trash'=> true ])->with('page_title', $this->page_title);
    }

    public function restore($id){
        Customer::withTrashed()->where('id', $id)->restore();
        return redirect(url('customers/bin'));
    }

    public function remove(Request $request){
        Customer::onlyTrashed()->where('id',  $request->get('id'))->forceDelete();
        return redirect(url('customers/bin'));
    }

    public function deleteAll(Request $request){
        $ids = $request->get('ids');
        $dbs = DB::delete('DELETE FROM customers WHERE id IN ('.implode(",", $ids).')');
        return redirect(url('customers/bin'));
    }
}
