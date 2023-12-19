<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create(){
        return view('admin.gallery.create',['menu'=>3]);
    }

    public function destroy($id){
        $images = Gallery::find($id);
        
        $filename = $images->img;
        // dd(public_path('img/staff/'.$filename),\File::exists(public_path('img/staff/'.$filename)));
        
        if (\File::exists(public_path('img/gallery/'.$filename))) {
            \File::delete(public_path('img/gallery/'.$filename));
        }
        $images->delete();

        return redirect('dashboard/gallery');
    }

    public function edit($id){
        $images = Gallery::find($id);
        

        return view('admin.gallery.edit',['menu'=>3,'gallery'=>$images]);
    }

    public function index(){
        $images = Gallery::orderBy('created_at','asc')->paginate(20);
        return view('admin.gallery.index',['menu'=>3,'galleries'=>$images]);

    }

    public function show($id){
        // dd($id);
        $gallery = Gallery::find($id);
        
        // dd($gallery);
        return view('admin.gallery.show',['menu'=>3,'gallery'=>$gallery]);

    }

    public function store(Request $request){
        //  dd($request);
        $images = new Gallery();
        $images->name = $request->name;
        //$images->description = "";
        // $images->stock_status= $request->stock_status;
        // $images->price = $request->price;
        // $images->size = $request->size;
        // $images->variety = $request->variety;
        if($request->hasFile('img')){//バリデーションでチェックするなら、ここは無くてもいいかも
            //アップロードに成功しているか確認
            if($request->file('img')->isValid()){
                $file=$request->img;
                $path = public_path().'/img/gallery';
                $filename = time().'.'.$file->extension();
                $upload = $file->move($path,$filename);
                // $filename = $request->img->store('public/img/gallery');
                $images->img= basename($filename);
            } else {
                            return redirect()
                                    ->back()
                                    ->withInput()
                                    ->withErrors(['file' => '不正なデータです。']);
                                }
        }
        
        $images->save();
        
        
        return view('admin.gallery.show',['menu'=>3,'gallery'=>$images]);
    }

    public function update(Request $request,$id){
        // dd($request);
        $images = Gallery::find($id);
        $images->name = $request->name;
        // $images->price = $request->price;
        // $images->size = $request->size;
        // $images->variety = $request->variety;
        if($request->hasFile('img')){//バリデーションでチェックするなら、ここは無くてもいいかも
            //アップロードに成功しているか確認
            if($request->file('img')->isValid()){
                $file=$request->img;
                $path = public_path().'/img/gallery';
                $filename = time().'.'.$file->extension();
                $upload = $file->move($path,$filename);
                // $filename = $request->img->store('public/img/gallery');
                $images->img= basename($filename);
            } else {
                            return redirect()
                                    ->back()
                                    ->withInput()
                                    ->withErrors(['file' => '不正なデータです。']);
                                }
        }
        // $images->img= $request->img;
        // $images->description = $request->description;
        // $images->stock_status= $request->stock_status;
        $images->update();

        return view('admin.gallery.show',['menu'=>3,'gallery'=>$images]);
    }
}
