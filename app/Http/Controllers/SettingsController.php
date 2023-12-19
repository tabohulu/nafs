<?php

namespace App\Http\Controllers;

use App\Models\HomeSettings;
use Illuminate\Http\Request;


class SettingsController extends Controller
{
    public function index(){
        // $timeslots = TimeSlots::get();
        $summaries = HomeSettings::where('key','summary')->get();
        $missions = HomeSettings::where('key','mission')->get();
        $visions = HomeSettings::where('key','vision')->get();
        // dd($summaries);
        
        return view('admin.settings.index',['menu'=>8,'summaries'=>$summaries
        ,'missions'=>$missions,'visions'=>$visions]);

    }

    // public function timeslotdelete($id){
    //     $timeslot= TimeSlots::find($id);
    //     $timeslot->delete();
    //     return redirect('dashboard/settings');
    // }

    public function summarydelete($id){
        // dd($id);
        $summary= HomeSettings::find($id);
        $summary->delete();
        return redirect('dashboard/settings');
    }

    public function change(Request $request){
        // dd($request);
        foreach($request->except('_token')  as $req=>$val){
            if($req =='old_summary'){
                for($i=0;$i<count($val);$i++){
                    $setting = HomeSettings::find($request->old_summary_id[$i]);
                    $setting->value=$val[$i];
                    $setting->update();
                }
            }elseif($req =='summary'){
                for($i=0;$i<count($val);$i++){
                    $setting = new HomeSettings();
                    $setting->key =$req;
                    $setting->value=$val[$i];
                    $setting->save();
                    // dd($val[$i]);
                }
            }elseif($req =='old_summary_mission'){
                for($i=0;$i<count($val);$i++){
                    $setting = HomeSettings::find($request->old_summary_mission_id[$i]);
                    $setting->value=$val[$i];
                    $setting->update();
                }
            }elseif($req =='summary_mission'){
                for($i=0;$i<count($val);$i++){
                    $setting = new HomeSettings();
                    $setting->key =$req;
                    $setting->value=$val[$i];
                    $setting->save();
                    // dd($val[$i]);
                }
            }elseif($req =='old_summary_vision'){
                for($i=0;$i<count($val);$i++){
                    $setting = HomeSettings::find($request->old_summary_vision_id[$i]);
                    $setting->value=$val[$i];
                    $setting->update();
                }
            }elseif($req =='summary_vision'){
                for($i=0;$i<count($val);$i++){
                    $setting = new HomeSettings();
                    $setting->key =$req;
                    $setting->value=$val[$i];
                    $setting->save();
                    // dd($val[$i]);
                }
            }else{
                if($req=='old_summary_id' || $req=='old_summary_mission_id' 
                || $req=='old_summary_vision_id' ||$req=='old_slot_id' || $req=='old_img' || $req=='img'
                || $req=='old_img2' || $req=='img2'){
                    continue;
                }

                // if(!empty(HomeSettings::find(HomeSettings::where('key',$req)))){
                    $setting = HomeSettings::find(HomeSettings::where('key',$req)->first()->id);
                    $setting->value =$val;
                    // if($req == "is_instagram"){
                    //     dd([$req, $val, $setting->value]);
                    // }

                    
                    $setting->update();
                // }else{
                //     $setting = new HomeSettings();
                //     $setting->key = $req;
                //     $setting->value =$val;
                //     $setting->save();
                // }
            
            }

            
        }
        if($request->hasFile('img')){
            
            //アップロードに成功しているか確認
            if($request->file('img')->isValid()){
                $file=$request->img;
                $path = public_path().'/img';
                $filename = time().'.'.$file->extension();
                // dd($file);
                $upload = $file->move($path,$filename);
                // dd(basename($filename));
                // $filename = $request->img->store('public/img/services');
                $setting = HomeSettings::find(HomeSettings::where('key','img')->first()->id);
                $setting->value= basename($filename);
                $setting->update();
            } else {
                            return redirect()
                                    ->back()
                                    ->withInput()
                                    ->withErrors(['file' => '不正なデータです。']);
                                }
        }

        // if($request->hasFile('img2')){
        //     //アップロードに成功しているか確認
        //     if($request->file('img2')->isValid()){
        //         $file=$request->img2;
        //         $path = public_path().'/img';
        //         $filename = time().'.'.$file->extension();
        //         $upload = $file->move($path,$filename);
        //         // $filename = $request->img2->store('public/img2/services');
        //         $setting = HomeSettings::find(HomeSettings::where('key','img2')->first()->id);
        //         $setting->value= basename($filename);
        //         $setting->update();
        //     } else {
        //                     return redirect()
        //                             ->back()
        //                             ->withInput()
        //                             ->withErrors(['file' => '不正なデータです。']);
        //                         }
        // }

        return redirect('dashboard/settings');
        // $weekday=HomeSettings::where('key','weekday');
        // $weekday->value =
    //     $services = Service::find($id);

    //     $services->name = $request->name;
    //     $services->time= $request->time;
    //     $services->price = $request->price;
    //     $services->position = $request->position;
    //     $services->menu = $request->menu;

    //     $services->short_name = $request->short_name;
    //     $services->other = $request->other??"";
    //     $services->sets = $request->sets;
    //     $services->summary = $request->summary;
    //     $services->tax_type = $request->tax_type;
    //     $services->time_type = $request->time_type;

       
    //     $services->update();

    //     if($request->old_content){
    //         for($i = 0;$i<count($request->old_content);$i++){
    //         $servicedescription = ServiceDescription::find($request->old_content_id[$i]);
    //         $servicedescription->service_id = $services->id;
    //         $servicedescription->content = $request->old_content[$i];
    //         $servicedescription->istitle = $request->old_istitle[$i];
    //         $servicedescription->update();
    //     }
            
    //     }

    //     if($request->content){
    //         $description=$request->content;
    //         $istitle=$request->istitle;
    //         for($i=0;$i<count($description);$i++){
    //         $servicedescription = new ServiceDescription();
    //         $servicedescription->service_id = $services->id;
    //         $servicedescription->content = $description[$i];
    //         $servicedescription->istitle = $istitle[$i];
    //         $servicedescription->save();
    //     }
    //     }

    //     $servicedescriptions = ServiceDescription::where('service_id',$id)->get();

    //     return view('admin.services.show',['menu'=>7,'service'=>$services,
    // 'servicedescriptions'=>$servicedescriptions]);
    }
}
