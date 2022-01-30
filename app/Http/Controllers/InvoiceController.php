<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('invoice_data')->get();

       //return $invoices;
        return view('invoice.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  return Auth::user()->id;
        return view('invoice.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $input = $request->all();

        $item_length = $input['item_length'];

        if ($item_length > 0)
        {
            $invoice_data['user_id'] = Auth::user()->id;
            $invoice_data['total_items'] = $item_length;
            $invoice_id = Invoice::create($invoice_data)->id;
            for ($i=0;$i<$item_length;$i++)
            {
                $item_data['invoice_id'] = $invoice_id;
                $item_data['name'] = $input['item_name_'.$i];
                $item_data['qty'] = $input['qty_'.$i];
                $item_data['price'] = $input['price_'.$i];
                $item_data['total_amount'] = $input['qty_'.$i] * $input['price_'.$i];
                InvoiceItem::create($item_data);
            }
        }
        $request->session()->flash('response',"success");
        $request->session()->flash('msg',"Invoice Added Successfully.");
        return redirect('invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function item_view($id)
    {
        $invoicItems = InvoiceItem::where('invoice_id',$id)->get();
        return view('invoice.item_view',compact('invoicItems'));
    }
}
