<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /** Product catalog. Move to a DB table later if you need an admin panel. */
    public static function products(): array
    {
        return [
            [
                'id' => 'JML-01',
                'title' => 'প্রিমিয়াম সুতি হাতের কাজের থ্রি-পিস - কোড: JML-01',
                'image' => 'product-1.jpg',
                'regular' => 2200, 'offer' => 1750,
                'features' => ['প্রিমিয়াম সুতি কাপড়', 'হাতে সেলাই করা নকশা', 'সাথে ওড়না ও সালোয়ার','সুতার নিখুঁত ও আকর্ষণীয় কারুকাজ','আকর্ষণীয় কালার কম্বিনেশন','ঝলমলে মিরর/চুমকি ওয়ার্ক যা প্রিমিয়াম লুক দেয়','রং না ওঠার গ্যারান্টি'],
            ],
            [
                'id' => 'JML-02',
                'title' => 'মিন্ট গ্রিন হ্যান্ডস্টিচ থ্রি-পিস - কোড: JML-02',
                'image' => 'product-2.jpg',
                'regular' => 2200, 'offer' => 1750,
                'features' => ['প্রিমিয়াম সুতি কাপড়', 'হাতে সেলাই করা নকশা', 'সাথে ওড়না ও সালোয়ার','সুতার নিখুঁত ও আকর্ষণীয় কারুকাজ','আকর্ষণীয় কালার কম্বিনেশন','ঝলমলে মিরর/চুমকি ওয়ার্ক যা প্রিমিয়াম লুক দেয়','রং না ওঠার গ্যারান্টি'],
            ],
            [
                'id' => 'JML-03',
                'title' => 'গোলাপি কালার নকশি কাঁথা স্টিচ থ্রি-পিস - কোড: JML-03',
                'image' => 'product-3.jpg',
                'regular' => 2200, 'offer' => 1750,
                'features' => ['প্রিমিয়াম সুতি কাপড়', 'হাতে সেলাই করা নকশা', 'সাথে ওড়না ও সালোয়ার','সুতার নিখুঁত ও আকর্ষণীয় কারুকাজ','আকর্ষণীয় কালার কম্বিনেশন','ঝলমলে মিরর/চুমকি ওয়ার্ক যা প্রিমিয়াম লুক দেয়','রং না ওঠার গ্যারান্টি'],
            ],
            [
                'id' => 'JML-04',
                'title' => ' টোরে কালার সুতি হাতের কাজের থ্রি-পিস - কোড: JML-04',
                'image' => 'product-4.jpg',
                'regular' => 2200, 'offer' => 1750,
                'features' => ['প্রিমিয়াম সুতি কাপড়', 'হাতে সেলাই করা নকশা', 'সাথে ওড়না ও সালোয়ার','সুতার নিখুঁত ও আকর্ষণীয় কারুকাজ','আকর্ষণীয় কালার কম্বিনেশন','ঝলমলে মিরর/চুমকি ওয়ার্ক যা প্রিমিয়াম লুক দেয়','রং না ওঠার গ্যারান্টি'],
            ],
        ];
    }

    public const DELIVERY = ['inside' => 80, 'outside' => 150];

    public function index()
    {
        return view('landing', ['products' => self::products()]);
    }

    public function store(Request $request)
    {
        $products = collect(self::products())->keyBy('id');

        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            // Bangladeshi mobile: exactly 11 digits, starts with 01[3-9]
            'phone' => ['required', 'regex:/^01[3-9]\d{8}$/'],
            'address' => ['required', 'string', 'min:10', 'max:400'],
            'product_id' => ['required', Rule::in($products->keys())],
            'area' => ['required', Rule::in(array_keys(self::DELIVERY))],
        ], [
            'name.required' => 'সম্পূর্ণ নাম লিখুন',
            'name.min' => 'সম্পূর্ণ নাম লিখুন',
            'phone.required' => '১১ ডিজিটের সঠিক মোবাইল নম্বর লিখুন (যেমন: ০১৭xxxxxxxx)',
            'phone.regex' => '১১ ডিজিটের সঠিক মোবাইল নম্বর লিখুন (যেমন: ০১৭xxxxxxxx)',
            'address.required' => 'থানা ও জেলাসহ সম্পূর্ণ ঠিকানা লিখুন',
            'address.min' => 'থানা ও জেলাসহ সম্পূর্ণ ঠিকানা লিখুন',
        ]);

        // Prices always come from the server, never from the browser.
        $product = $products[$data['product_id']];
        $fee = self::DELIVERY[$data['area']];

        $order = Order::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'product_id' => $product['id'],
            'product_title' => $product['title'],
            'price' => $product['offer'],
            'delivery_area' => $data['area'],
            'delivery_fee' => $fee,
            'total' => $product['offer'] + $fee,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('order', $order->toArray());
    }
}