<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart;
class CartController extends Controller
{
    public function show(){
        return view('cart');
    }
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        $amount=count($cartItems);
        if ($amount!=0) {
            return view('cart', compact('cartItems'));
        }
        if ($amount==0)
        {
            session()->flash('success', 'Корзина пуста');
            return view('cart',compact('cartItems'));
        }
    }
    public function check(){
        return view('check');
    }
    public function order(){
        $cartItems = \Cart::getContent();
        $price=\Cart::getTotal();
        $user=Auth::id();
        $t= new OrderController;
        $t->add($user, $cartItems, $price);
        \Cart::clear();
        return view('home');
    }
    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->image,
                )
            ]);
            return redirect()->back();
            //return response()->json(['success'=>'Form is successfully submitted!']);
        }
        else return view('auth.register');
    }

    public function updateCart(Request $request)
    {
       if($request->quantity!=0) {
           \Cart::update(
               $request->id,
               [
                   'quantity' => [
                       'relative' => false,
                       'value' => $request->quantity
                   ],
               ]
           );
           return response()->json(
               \Cart::getTotal()
           );
       }

    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'Корзина пуста.');
        return redirect()->route('cart.list');
    }
}
