<?php

namespace App\Http\Controllers\Company;

use App\Companies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class CompanyController extends Controller
{

    public function save(Request $request){


        if($request->companyCheck > 0){

            $table =  Companies::first();

            if($request->hasFile('logo')){
                File::delete(public_path('logo/'.$table->logo));

                //Image Upload
                $thumbs_sm = Image::make($request->file('logo'));
                $thumbs_sm->resize(null, 150, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imageStream_sm = $thumbs_sm->stream(request()->logo->getClientOriginalExtension());
                $fileName = md5(date('y-m-d H:i:s')).'.'.request()->logo->getClientOriginalExtension();
                Storage::disk('company')->put('logo/'.$fileName, $imageStream_sm->__toString());
                //Image Upload

            }else{
                $fileName = $table->logo;
            }

            $table->name = $request->name;
            $table->phone = $request->phone;
            $table->mobile = $request->mobile;
            $table->address = $request->address;
            $table->website = $request->website;
            $table->email = $request->email;
            $table->owner = $request->owner;
            $table->logo = $fileName;
            $table->save();


//            Companies::where('userID', Auth::user()->id)->update([
//                'name' => $request->name,
//                'phone' => $request->phone,
//                'mobile' => $request->mobile,
//                'address' => $request->address,
//                'website' => $request->website,
//                'email' => $request->email,
//                'owner' => $request->owner,
//                'logo' => $fileName
//            ]);

        }else{

            //Image Upload
            $thumbs_sm = Image::make($request->file('logo'));
            $thumbs_sm->resize(null, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageStream_sm = $thumbs_sm->stream(request()->logo->getClientOriginalExtension());
            $fileName = md5(date('y-m-d H:i:s')).'.'.request()->logo->getClientOriginalExtension();
            Storage::disk('company')->put('logo/'.$fileName, $imageStream_sm->__toString());
            //Image Upload

            $table = new Companies();
            $table->name = $request->name;
            $table->phone = $request->phone;
            $table->mobile = $request->mobile;
            $table->address = $request->address;
            $table->website = $request->website;
            $table->email = $request->email;
            $table->owner = $request->owner;
            $table->logo = $fileName;

            $table->save();
        }

        return redirect()->back()->with(config('custom.save'));
    }

}
