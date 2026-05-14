<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaction = Transaction::orderBy('created_at','desc')->get();

        return view('transactions.index', ['transaction' => $transaction]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
        
        'title' => 'required',
        'amount' => 'required',
        'type' => 'required',
        'category' => 'required',
        ]);
        if ($validator->fails()){
            return redirect(route('transactions.create'))->withErrors($validator)->withInput();
        }

        $transaction = new Transaction();
        $transaction->title = $request->title;
        $transaction->amount = $request->amount;
        $transaction->type = $request->type;
        $transaction->category = $request->category;
        $transaction->save();

        return redirect(route('transactions.create'))->with('success','Transaction Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $transaction = Transaction::FindOrFail($id);

        return view('transactions.edit', ['transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $transaction = Transaction::FindOrFail($id);

        $validator = Validator::make($request->all(),[

        'title' => 'required',
        'amount' => 'required',
        'type' => 'required',
        'category' => 'required',
        ]);

         if ($validator->fails()){
            return redirect(route('transactions.edit',$transaction->id))->withErrors($validator)->withInput();
        }

        
        $transaction->title = $request->title;
        $transaction->amount = $request->amount;
        $transaction->type = $request->type;
        $transaction->category = $request->category;
        $transaction->save();

          return redirect(route('transactions.index'))->with('success','Transaction Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $transaction = Transaction::FindOrFail($id);

        $transaction->delete();

        return redirect(route('transactions.index'))->with('success','Transaction Deleted Successfully');
    }
}
