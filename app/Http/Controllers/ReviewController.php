<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ReviewController extends Controller
{
    public function create(Request $request, $order_sn, $product_id){
        // dd($request->id);
        $product = Product::find($product_id);
        return view('nafs.review',['product'=>$product, 'order_sn'=>$order_sn]);
    }

    public function destroy($id){
        $orders = Review::find($id);
        
        
        $orders->delete();


        return redirect('dashboard/reviews');
    }

    public function edit($id){
        $order = Orders::find($id);

        

        return view('admin.reviews.edit',['menu'=>3,'order'=>$order]);
    }

    public function index(){
        $reviews = Review::orderBy('created_at','asc')->paginate(20);
        
        return view('admin.reviews.index',['reviews'=>$reviews]);

    }
    

    public function show($id){
        $review= Review::find($id);
        $product = Product::find($review->product_id);
        
        
        return view('admin.reviews.show',['review'=>$review,'product'=>$product]);

    }

    public function showorder($order_sn){
        $order_id = Orders::where('order_sn',$order_sn)->first()->id;
        
        
        return redirect('/dashboard/orders/'.$order_id);

    }

    public function save(Request $request){
        //  dd($request);
        $review = new Review();
        $review->review = $request->userreview;
        $review->rating= $request->rating;
        $review->product_id = $request->id;
        $review->order_sn = $request->order_sn;
        
        
        $review->save();
        
        
        
        return view('nafs.review_confirm',['review'=>$review]);
    }

    public function store(Request $request){
        //  dd($request);
        $orders = new Orders();
        $orders->name = $request->name;
        //$orders->description = "";
        $orders->stock_status= $request->stock_status;
        $orders->price = $request->price;
        $orders->size = $request->size;
        $orders->variety = $request->variety;
        if($request->hasFile('img')){//バリデーションでチェックするなら、ここは無くてもいいかも
            //アップロードに成功しているか確認
            if($request->file('img')->isValid()){
                $file=$request->img;
                $path = public_path().'/img/orders';
                $filename = time().'.'.$file->extension();
                $upload = $file->move($path,$filename);
                // $filename = $request->img->store('public/img/orders');
                $orders->img= basename($filename);
            } else {
                            return redirect()
                                    ->back()
                                    ->withInput()
                                    ->withErrors(['file' => '不正なデータです。']);
                                }
        }
        
        $orders->save();
        
        
        
        return view('admin.reviews.show',['menu'=>3,'product'=>$orders]);
    }

    public function update(Request $request,$id){
        // dd($request->quantity);
        $order = Orders::find($id);
        $order->location          = $request->location         ;
        $order->quantity          = $request->quantity         ;
        $order->product_id        = $request->product_id       ;
        $order->payment_method    = $request->payment_method   ;
        $order->momo_name         = ($request->payment_method == 'momo')?$request->momo_name    : ''       ;
        $order->momo_number       = ($request->payment_method == 'momo')?$request->momo_number  : ''       ;
        $order->delivery_method   = $request->delivery_method  ;
        $order->total             = $request->total            ;
        $order->order_sn          = $order->order_sn       ;
        
        $order->update();
        return redirect('review/orders/'.$order->id);
        

        

        // return view('admin.reviews.show',['menu'=>3,'product'=>$order]);
    }

    //Main Page Routes
    public function main(){
        $orders= Orders::get();
        // dd($orders);

        return view('nafs.reviews',['menu'=>3,'orders'=>$orders]);

    }

    public function confirmOrderSn(Request $request){
        // dd($request);
        
        $review = Review::where('order_sn',$request->order_sn)->first();
        $order = Orders::where('order_sn',$request->order_sn)
        ->where('product_id',$request->id)
        ->where('cancelled',0)
        ->first();
        
        return response()->json([$order,$review]);

    }
}
