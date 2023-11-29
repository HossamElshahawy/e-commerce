<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request){

        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($q) use ($request){
                    return $q->whereDate('created_at',$request->date);
                    }, function ($q) use ($todayDate){
                     return $q->whereDate('created_at',$todayDate);
                    })->when($request->status != null, function ($q) use ($request){
                    return $q->where('status',$request->status);
                    })
                    ->paginate(7);

        return view('admin.order.index',compact('orders'));
    }

    public function show($orderId){
        $order = Order::where('id',$orderId)->first();
        if ($order){
            return view('admin.order.show',compact('order'));
        }
        return redirect('admin/orders')->with('error','Order Id Not Found');

    }

    public function updateOrderStatus(int $orderId, Request $request){

        $order = Order::where('id',$orderId)->first();
        if ($order){
            $order->update([
                'status_message' => $request->status_message,
            ]);
            return view('admin.order.show',compact('order'))->with('message','Status Updated');
        }
        return redirect('admin/orders')->with('error','Order Id Not Found');


    }

    public function showInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.show_invoice',compact('order'));
    }

    public function invoiceDownload(int $orderId){
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.show_invoice', $data);
        $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }
}
