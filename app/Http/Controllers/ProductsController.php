<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Models\Gallery;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDescription;
use App\Models\Review;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{

    public function create(){
        return view('admin.products.create',['menu'=>3]);
    }

    public function descriptiondelete(Request $request){
        $id = $request->id;
        // dd($id);
        $product_description= ProductDescription::find($id);
        $product_id=$product_description->product_id;
        $product_description->delete();
        
        return redirect('dashboard/products/'.$product_id.'/edit');
    }

    public function destroy($id){
        $products = Product::find($id);
        $productdescriptions = ProductDescription::where('product_id',$id)->get();
        foreach($productdescriptions as $description){
            $description->delete();
        }
        $filename = $products->img;
        // dd(public_path('img/staff/'.$filename),\File::exists(public_path('img/staff/'.$filename)));
        
        if (\File::exists(public_path('img/products/'.$filename))) {
            \File::delete(public_path('img/products/'.$filename));
        }
        $products->delete();

        return redirect('dashboard/products');
    }

    public function edit($id){
        $products = Product::find($id);
        $productdescriptions = ProductDescription::where('product_id',$id)->get();

        return view('admin.products.edit',['menu'=>3,'products'=>$products
        ,'productdescriptions'=>$productdescriptions]);
    }

    public function index(){
        $products = Product::orderBy('created_at','asc')->paginate(20);
        return view('admin.products.index',['menu'=>3,'products'=>$products]);

    }

    public function show($id){
        // dd($id);
        $product = Product::find($id);
        $productdescriptions = ProductDescription::where('product_id',$id)->get();
        // dd($product);
        return view('admin.products.show',['menu'=>3,'product'=>$product,'productdescriptions'=>$productdescriptions]);

    }

    public function store(Request $request){
        //  dd($request);
        $products = new Product();
        $products->name = $request->name;
        //$products->description = "";
        $products->stock_status= $request->stock_status;
        $products->price = $request->price;
        $products->size = $request->size;
        $products->variety = $request->variety;
        if($request->hasFile('img')){//バリデーションでチェックするなら、ここは無くてもいいかも
            //アップロードに成功しているか確認
            if($request->file('img')->isValid()){
                $file=$request->img;
                $path = public_path().'/img/products';
                $filename = time().'.'.$file->extension();
                $upload = $file->move($path,$filename);
                // $filename = $request->img->store('public/img/products');
                $products->img= basename($filename);
            } else {
                            return redirect()
                                    ->back()
                                    ->withInput()
                                    ->withErrors(['file' => '不正なデータです。']);
                                }
        }
        
        $products->save();
        if($request->description){
            foreach($request->description as $description){
            $productdescription = new ProductDescription();
            $productdescription->product_id = $products->id;
            $productdescription->content = $description;
            $productdescription->save();
        }
            
        }
        
        $productdescriptions = ProductDescription::where('product_id',$products->id)->get();
        return view('admin.products.show',['menu'=>3,'product'=>$products
        ,'productdescriptions'=>$productdescriptions]);
    }

    public function update(Request $request,$id){
        // dd($request);
        $products = Product::find($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->size = $request->size;
        $products->variety = $request->variety;
        if($request->hasFile('img')){//バリデーションでチェックするなら、ここは無くてもいいかも
            //アップロードに成功しているか確認
            if($request->file('img')->isValid()){
                $file=$request->img;
                $path = public_path().'/img/products';
                $filename = time().'.'.$file->extension();
                $upload = $file->move($path,$filename);
                // $filename = $request->img->store('public/img/products');
                $products->img= basename($filename);
            } else {
                            return redirect()
                                    ->back()
                                    ->withInput()
                                    ->withErrors(['file' => '不正なデータです。']);
                                }
        }
        // $products->img= $request->img;
        // $products->description = $request->description;
        $products->stock_status= $request->stock_status;
        $products->update();

        if($request->old_description){
            for($i = 0;$i<count($request->old_description);$i++){
            $productdescription = ProductDescription::find($request->old_description_id[$i]);
            $productdescription->product_id = $products->id;
            $productdescription->content = $request->old_description[$i];
            $productdescription->update();
        }
            
        }

        if($request->description){
            foreach($request->description as $description){
            $productdescription = new ProductDescription();
            $productdescription->product_id = $products->id;
            $productdescription->content = $description;
            $productdescription->save();
        }
        }

        $productdescriptions = ProductDescription::where('product_id',$id)->get();

        return view('admin.products.show',['menu'=>3,'product'=>$products,
    'productdescriptions'=>$productdescriptions]);
    }

    //Main Page Routes
    public function main(){
        $products= Product::get();
        $img_gallery = Gallery::orderBy('created_at','asc')->paginate(20);
        // dd($products);

        return view('nafs.products',['menu'=>3,'products'=>$products,'img_gallery'=>$img_gallery]);

    }

    public function details($id){
        $products= Product::find($id);
        $reviews = Review::where('product_id',$products->id)->orderBy('created_at','desc')->get();
        // dd(count($reviews));
        $productdescriptions = ProductDescription::where('product_id',$products->id)->get();

        return view('nafs.detail',['productdescriptions'=>$productdescriptions,
        'product'=>$products,'reviews'=>$reviews]);

    }

    public function order(Request $request){
        // dd($request);
      $order_sn = $this->initializeOrderSN($request->id);
      $date = Carbon::now()->toDateString();  
      $name = $request->name;
      $img = $request->img;
      $prod_price  = $request->prod_price ;
      $quantity = $request->quantity;
      $size  = $request->size ;
      $variety = $request->variety;
      $payment_method       = $request->payment_method ;
      $momo_name            =  ($request->payment_method=='momo') ?   $request->momo_name     :  "";
      $momo_number          = ($request->payment_method=='momo') ?   $request->momo_number   :  "";
      $customer_name        = $request  ->customer_name ;
      $customer_number      = $request  ->customer_number;
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
        $order  ->  customer_name       =   $customer_name      ;
        $order  ->  customer_number     =   $customer_number    ;
        $order  ->  location            =   $location       ;
        $order  ->  date                =   $date           ;
        $order  ->  cancelled           =   false           ;
        $order->shipped                 =   false             ;
       $order->save() ;
        // $products= Product::find($id);
        // $productdescriptions = ProductDescription::where('product_id',$products->id)->get();

        // return view('emails.alert',[
        //     "product"              => Product::find($request->id)           ,
        //     "order"              => $order            
        
        // ]);
        Mail::to('mail@mail.com')->send(new OrderCreated($order,Product::find($request->id)));
        
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
        "customer_name"         => $customer_name       ,
        "customer_number"       => $customer_number     ,
        "delivery_method"   => $delivery_method  ,
        "location"          => $location         ,
        "total"             => $total            ,
        "order_sn"          => $order_sn       
    
    ]);

    }

    public function initializeOrderSN($product_id){
        // dd(str_repeat('0',3-strlen((string)$product_id)));
        $order_sn=null;
        $existing_order = Orders::where('product_id',$product_id)->orderBy('id','DESC')->first();
        if($existing_order){
            $order_sn=$existing_order->order_sn;
        }
        $today=Carbon::now();

    $month=explode('-',$today->toDateString())[1];
    $year=explode('-',$today->toDateString())[0];
    if($order_sn==null || $month!==explode('-',$order_sn)[2]){
        $order_sn=str_repeat('0',3-strlen((string)$product_id)).$product_id.'-'.$year.'-'.$month.'-001';
        // $order_sn=$year.'-'.$month.'-000-001';
    }else{
        $last_order_number=(int)explode('-',$order_sn)[3];
        // if(count(explode('-',$order_sn))>3){
        //     $last_order_number=(int)explode('-',$order_sn)[3];
        // }
        $new_order_number=$last_order_number+1;
        $order_sn=str_repeat('0',3-strlen((string)$product_id)).$product_id.'-'.$year.'-'.$month.'-'.str_repeat('0',3-strlen((string)$new_order_number)).$new_order_number;
        
        // $order_sn=$year.'-'.$month.'-000-'.str_repeat('0',3-strlen((string)$last_order_number)).$last_order_number+1;
    }
    // dd($order_sn);
    return $order_sn;
    }
}
