<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Table;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function RazorView(Request $request){
        $orderid = $request->orderid;
        $totalAmount =$request->totalAmount;
        $amounts=0;
        foreach($totalAmount as $amount){
            $amounts +=$amount;
        }
        $table = Booking::where('ord_id',$orderid)->get();
        foreach($table as $book){
            $price = $book->table_amount;
        }
        return view('User.razorpayindex',compact('amounts','orderid','price'));
    }
    public function RazorPayStore(Request $request)
    {
        // try {
            $input = $request->all();

            $api = new Api("rzp_test_zRyA7WHAPmrtQg", "x5lOO9VdfdOhdcWo1FfR8Xd1");

            $payment = $api->payment->fetch($input['razorpay_payment_id']);
            $userId = Session::get('user')['id'];

            if (count($input)  && !empty($input['razorpay_payment_id'])) {
                try {
                    $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                } catch (QueryException $e) {
                    return  $e->getMessage();
                    Session::put('error', $e->getMessage());
                    return redirect()->back();
                }
            }

            Session::put('success', 'Payment successful');
            $paymentid = $request->input('orderid');
            $bookings = Booking::where('ord_id', $paymentid)->get();
            
            Cart::where('order_id',$paymentid)->delete();
            foreach ($bookings as $item) {
                $item->update(['payment_status' => true]);
                $tableid = $item->table_no;
                Payment::create([
                    'payment_for' => true ,
                    'payment_status' => true,
                    'name' => $item->name,
                    'email' => $item->email,
                    'user_id' => $item->user_id,
                    'order_id' =>$paymentid
                    // 'items' => $item->items,
                    // 'qty' => $item->quantity,
                    
                ]);
            }
            Table::where('id',$tableid)->update(['status'=> false]);
            // dd($tableid,$bookings);
            
            
            return redirect('/myorders');
        // } catch (QueryException $e) {
        //     return response()->json(['message' => 'Failed to get razorpay'], 500);
        // }
        
    }
    public function Invoice()
    {
        return view('Home.invoice');
    }
}
