<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;

class HomeController extends Controller
{
    public function homeSlider(){
        $homeslide = HomeSlide::find(1);
        $data['title'] = 'Data Home Slide';
        return view('admin.homeSlide.home_slideAll', compact('homeslide'), $data);
    }

    public function updateSlider(Request $request){
        $slide_id = $request->id;
        if($request->file('home_slide')){
            $image = $request->file('home_slide');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_generate);
            $save_url = 'upload/home_slide/'.$name_generate;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url
            ]);
            
            $notification = array(
            'message'    => 'Home Slide Updated',
            'alert-type' => 'success'
        );
        return back()->with($notification);

        }else{
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url
            ]);
            
            $notification = array(
            'message'    => 'Home Slide Updated',
            'alert-type' => 'success'
        );

        return back()->with($notification);
        }
    }
}
