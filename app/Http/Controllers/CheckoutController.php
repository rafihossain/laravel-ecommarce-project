<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Session;
use Mail;
use Cart;
class CheckoutController extends Controller
{
    public function index () {
        return view ('font-end.checkout.checkout-content');
    }

    protected function customerSignUpBasicInfo ($request) {
        $customer = new Customer();
        $customer->first_name     = $request->first_name;
        $customer->last_name      = $request->last_name;
        $customer->email_address  = $request->email_address;
        $customer->password       = bcrypt($request->password);
        $customer->phone          = $request->phone;
        $customer->address        = $request->address;
        $customer->save();

        return $customer;
    }

    public function customerSignUp (Request $request) {
        $this->validate($request, [
            'email_address' => 'email|unique:customers,email_address'
        ]);

        $customer = $this->customerSignUpBasicInfo($request);

        Session::put('customerId', $customer->id);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);

        $data = $customer->toArray();

        Mail::send('font-end.mails.confirmation-mail', $data, function($message) use ($data) {
            $message->to($data['email_address']);
            $message->subject('confirmation mail');
        });

        return redirect ('/checkout/shipping');
    }



    public function customerLogin (Request $request) {
        $customer = Customer::where('email_address', $request->email_address)->first();

        if(password_verify($request->password, $customer->password)){
            
            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->first_name.' '.$customer->last_name);

            return redirect('/checkout/shipping');
            
        }else{
            return redirect('/checkout')->with('message', 'Invalid Password');
        }
    }
    public function customerLogout () {
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }



    public function accountLoginInfo () {
        return view('font-end.customer.customer-login-view');
    }
    public function accountRegisterInfo () {
        return view('font-end.customer.customer-register-view');
    }
    public function accountLogin (Request $request) {

        $customer = Customer::where('email_address', $request->email_address)->first();

        if(password_verify($request->password, $customer->password)){
            
            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->first_name.' '.$customer->last_name);

            return redirect('/user/account');
            
        }else{
            return redirect('/account/login-info')->with('message', 'Invalid Password');
        }
    }
    public function accountUser () {
        return view ('font-end.customer.customer-login');
    }

    public function accountRegister(Request $request) {
        $this->validate($request, [
            'email_address' => 'email|unique:customers,email_address'
        ]);

        $customer = $this->customerSignUpBasicInfo($request);

        // return $customer->all();

        Session::put('customerId', $customer->id);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);

        $data = $customer->toArray();

        Mail::send('font-end.mails.confirmation-mail', $data, function($message) use ($data) {
            $message->to($data['email_address']);
            $message->subject('confirmation mail');
        });

        return redirect ('/user/account');
    }



    public function shippingForm () {
        $customer = Customer::find(Session::get('customerId'));
        return view ('font-end.checkout.shipping', [
            'customer' => $customer
        ]);
    }
    public function saveShippingInfo (Request $request) {
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);

        return redirect ('/checkout/payment');
    }
    public function paymentForm () {
        return view ('font-end.checkout.payment');
    }

    public function newOrder (Request $request) {
        $paymentType = $request->payment_type;
        if($paymentType == 'Cash'){
            
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();
            }

            Cart::destroy();

            return redirect('/complete/order');





        }else if($paymentType == 'Paypal'){

        }else if($paymentType == 'Bkash'){

        }
    }

    public function completeOrder() {
        return view ('font-end.checkout.payment-success');
    }

    public function ajaxEmailCheck($a) {
        $customer = Customer::where('email_address', $a)->first();
        if($customer){
            echo "Already Exits";
        }else{
            echo "Available";
        }
    }
}
