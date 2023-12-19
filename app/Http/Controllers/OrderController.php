<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;


class OrderController extends Controller
{
    public function create(){
        return view('admin.orders.create',['menu'=>3]);
    }

    public function cancel($id){
        $order = Orders::find($id);
        $product_id = $order->product_id;
        if($order->cancelled == 0){
            $order->cancelled = 1;
        }else{
            $order->cancelled = 0;
        }
        $order->product_id = $product_id;
        $order->update();
        return redirect('dashboard/orders/'.$order->id);
    }

    public function destroy($id){
        $orders = Orders::find($id);
        
        
        $orders->delete();


        return redirect('dashboard/orders');
    }

    public function edit($id){
        $order = Orders::find($id);
        $product = Product::find($order->product_id);
        $products = Product::orderBy('id','asc')->get();

        

        return view('admin.orders.edit',['menu'=>3,'order'=>$order,
                                        'product'=>$product,
                                        'products'=>$products]);
    }

    public function index(Request $request){
        $dateRaw = Carbon::now();
        if($request->next!=null){
            $dateRaw=Carbon::parse($request->next.'-01');
        }elseif($request->prev!=null){
            // dd($request->prev);
            $dateRaw=Carbon::parse($request->prev.'-01');
        }
            $date=$dateRaw->toDateString();
            $dateNext = $dateRaw->addMonth()->toDateString();
            $datePrev = $dateRaw->subMonth(2)->toDateString();
            // dd($datePrev,$date,$dateNext);
            $current = substr($date,0,7);    
            $next = substr($dateNext,0,7); 
            $prev = substr($datePrev,0,7); 
        $orders = Orders::where('date','LIKE','%'.$current.'%')->orderBy('created_at','desc')->paginate(10);
        
        return view('admin.orders.index',['menu'=>3,'orders'=>$orders,
        'current'=>substr($date,0,4).'/'.substr($date,5,2),
        'next'=>substr($next,0,4).'-'.substr($next,5,2),
        'prev'=>substr($prev,0,4).'-'.substr($prev,5,2)]);

    }

    

    public function show($id){
        
        $order = Orders::find($id);
        $product=Product::find($order->product_id);
        return view('admin.orders.show',['menu'=>3,'order'=>$order,'product'=>$product]);

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
        
        
        
        return view('admin.orders.show',['menu'=>3,'product'=>$orders]);
    }

    public function update(Request $request,$id){
        // dd($request);
        $order = Orders::find($id);
        $order->location          = $request->location         ;
        $order->quantity          = $request->quantity         ;
        $order->product_id        = $request->product_id       ;
        $order->payment_method    = $request->payment_method   ;
        $order->momo_name         = ($request->payment_method == 'momo')?$request->momo_name    : ''       ;
        $order->momo_number       = ($request->payment_method == 'momo')?$request->momo_number  : ''       ;
        $order->customer_name     = $request->customer_name ;
        $order->customer_number   = $request->customer_number;
        $order->delivery_method   = $request->delivery_method  ;
        $order->total             = $request->total            ;
        $order->order_sn          = $order->order_sn       ;
        $order->shipped           = $request->shipped       ;
        
        $order->update();
        return redirect('dashboard/orders/'.$order->id);
        

        

        // return view('admin.orders.show',['menu'=>3,'product'=>$order]);
    }

    //Main Page Routes
    public function main(){
        $orders= Orders::get();
        // dd($orders);

        return view('nafs.orders',['menu'=>3,'orders'=>$orders]);

    }

    public function details($id){
        $orders= Orders::find($id);

        return view('nafs.detail',['product'=>$orders]);

    }

    public function order(Request $request){
        // dd($request);
      $date = Carbon::now()->toDateString();  
      $order_sn = $this->initializeOrderSN($request->id);
      $name = $request->name;
      $img = $request->img;
      $prod_price  = $request->prod_price ;
      $quantity = $request->quantity;
      $size  = $request->size ;
      $variety = $request->variety;
      $payment_method       =   $request->payment_method ;
      $momo_name            =  ($request->payment_method=='momo') ?   $request->momo_name     :  "";
      $momo_number          =   ($request->payment_method=='momo') ?   $request->momo_number   :  "";
      $delivery_method      = $request->delivery_method;
      $total                = $request->total ;
      $location             = $request->location;

      $order = new Orders();
        $order  ->  quantity            =   $quantity       ;
        $order  ->  order_sn            =   $order_sn       ;
        $order  ->  product_id          =   $request->id    ;
        $order  ->  total               =   $total          ;
        $order  ->  payment_method      =   $payment_method ;
        $order  ->  delivery_method     =   $delivery_method;
        $order  ->  momo_name           =   $momo_name      ;
        $order  ->  momo_number         =   $momo_number    ;
        $order  ->  location            =   $location       ;
        $order->save() ;
        // $orders= Orders::find($id);
        // $productdescriptions = ProductDescription::where('product_id',$orders->id)->get();

        return view('nafs.confirm',[
        "date"              => $date           ,
        "name"              => $name           ,
        "img"               => $img             ,
        "prod_price"        => $prod_price     ,
        "quantity"          => $quantity       ,
        "variety"           => $variety     ,
        "size"              => $size       ,
        "payment_method"    => $payment_method  ,
        "momo_name"         => $momo_name       ,
        "momo_number"       => $momo_number     ,
        "delivery_method"   => $delivery_method  ,
        "location"          => $location         ,
        "total"             => $total           
    
    ]);

    }

    public function initializeOrderSN($product_id){
        $order_sn=null;
        $existing_order = Orders::where('product_id',$product_id)->orderBy('id','DESC')->first();
        if($existing_order){
            $order_sn=$existing_order->order_sn;
        }
        $today=Carbon::now();

    $month=explode('-',$today->toDateString())[1];
    $year=explode('-',$today->toDateString())[0];
    if($order_sn==null || $month!==explode('-',$order_sn)[1]){
        $order_sn=$year.'-'.$month.'-001';
        // $order_sn=$year.'-'.$month.'-000-001';
    }else{
        $last_order_number=(int)explode('-',$order_sn)[2];
        if(count(explode('-',$order_sn))>3){
            $last_order_number=(int)explode('-',$order_sn)[3];
        }
        $new_order_number=$last_order_number+1;
        $order_sn=$year.'-'.$month.'-'.str_repeat('0',3-strlen((string)$new_order_number)).$new_order_number;
        
        // $order_sn=$year.'-'.$month.'-000-'.str_repeat('0',3-strlen((string)$last_order_number)).$last_order_number+1;
    }
    // dd($order_sn);
    return $order_sn;
    }
}
