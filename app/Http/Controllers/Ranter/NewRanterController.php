<?php

namespace App\Http\Controllers\Ranter;

use App\Cashbook;
use App\Ranter;
use App\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class NewRanterController extends Controller
{
    public function index($id = null){
        $relations = Ranter::select('relations')->orderBy('relations','ASC')->where('relations', '<>', null)->groupBy('relations')->get();
        $relations1 = Ranter::select('relations1')->orderBy('relations1','ASC')->where('relations1', '<>', null)->groupBy('relations1')->get();
        $relationsLoc = Ranter::select('relationsLoc')->orderBy('relationsLoc','ASC')->where('relationsLoc', '<>', null)->groupBy('relationsLoc')->get();

        $occupation = Ranter::select('occupation')->orderBy('occupation','ASC')->where('occupation', '<>', null)->groupBy('occupation')->get();
        $guardianOccupation = Ranter::select('guardianOccupation')->orderBy('guardianOccupation','ASC')->where('guardianOccupation', '<>', null)->groupBy('guardianOccupation')->get();
        $board = Ranter::select('boardSSC')->orderBy('boardSSC','ASC')->where('boardSSC', '<>', null)->groupBy('boardSSC')->get();
        $school = Ranter::select('school')->orderBy('school','ASC')->where('school', '<>', null)->groupBy('school')->get();
        $college = Ranter::select('college')->orderBy('college','ASC')->where('college', '<>', null)->groupBy('college')->get();
        $university = Ranter::select('universityHons')->orderBy('universityHons','ASC')->where('universityHons', '<>', null)->groupBy('universityHons')->get();
        $universitySubject = Ranter::select('subjectHons')->orderBy('subjectHons','ASC')->where('subjectHons', '<>', null)->groupBy('subjectHons')->get();
        $institute = Ranter::select('institute')->orderBy('institute','ASC')->where('institute', '<>', null)->groupBy('institute')->get();
        $company = Ranter::select('company')->orderBy('company','ASC')->where('company', '<>', null)->groupBy('company')->get();
        $group = Ranter::select('groupSSC')->orderBy('groupSSC','ASC')->where('groupSSC', '<>', null)->groupBy('groupSSC')->get();

        if($id){
            $table = Ranter::find($id);
            if($table != null){
                return view('ranter.new_ranter')->with([
                    'actions' => action('Ranter\NewRanterController@edit'),
                    'title' => 'Edit Ranter',
                    'table' => $table,
                    'relations' => $relations,
                    'relations1' => $relations1,
                    'relationsLoc' => $relationsLoc,
                    'occupation' => $occupation,
                    'guardianOccupation' => $guardianOccupation,
                    'board' => $board,
                    'group' => $group,
                    'school' => $school,
                    'college' => $college,
                    'university' => $university,
                    'universitySubject' => $universitySubject,
                    'institute' => $institute,
                    'company' => $company
                ]);
            }else{
                return redirect()->to('ranter/new');
            }

        }else{
            return view('ranter.new_ranter')->with([
                'actions' => action('Ranter\NewRanterController@save'),
                'title' => 'New Ranter',
                'relations' => $relations,
                'relations1' => $relations1,
                'relationsLoc' => $relationsLoc,
                'occupation' => $occupation,
                'guardianOccupation' => $guardianOccupation,
                'board' => $board,
                'group' => $group,
                'school' => $school,
                'college' => $college,
                'university' => $university,
                'universitySubject' => $universitySubject,
                'institute' => $institute,
                'company' => $company
            ]);
        }


    }

    public function save(Request $request){

        DB::beginTransaction();
        try {

            $maxValue = Ranter::max('serialNo');

        $table = new Ranter();


            //Image Upload
            if($request->hasFile('photo')){
                $thumbs_sm = Image::make($request->file('photo'));
                $thumbs_sm->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(300, 300, 'center', false, 'rgba(240, 240, 240, 240)');
                $imageStream_sm = $thumbs_sm->stream(request()->photo->getClientOriginalExtension());
                $fileName = md5(date('y-m-d H:i:s')).'.'.request()->photo->getClientOriginalExtension();
                Storage::disk('ranter')->put('ranter/'.$fileName, $imageStream_sm->__toString());
            }else{
                $fileName = null;
            }

              /************************/
            if($request->hasFile('guardianPhoto')){
                $g_thumbs_sm = Image::make($request->file('guardianPhoto'));
                $g_thumbs_sm->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $g_thumbs_sm->resizeCanvas(300, 300, 'center', false, 'rgba(240, 240, 240, 240)');
                $g_imageStream_sm = $g_thumbs_sm->stream(request()->guardianPhoto->getClientOriginalExtension());
                $g_fileName = 'g_'.md5(date('y-m-d H:i:s')).'.'.request()->guardianPhoto->getClientOriginalExtension();
                Storage::disk('ranter')->put('ranter/'.$g_fileName, $g_imageStream_sm->__toString());
            }else{
                $g_fileName = null;
            }

              /************************/
            if($request->hasFile('guardianPhotoLoc')){
                $gl_thumbs_sm = Image::make($request->file('guardianPhotoLoc'));
                $gl_thumbs_sm->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $gl_thumbs_sm->resizeCanvas(300, 300, 'center', false, 'rgba(240, 240, 240, 240)');
                $gl_imageStream_sm = $gl_thumbs_sm->stream(request()->guardianPhotoLoc->getClientOriginalExtension());
                $gl_fileName = 'gl_'.md5(date('y-m-d H:i:s')).'.'.request()->guardianPhotoLoc->getClientOriginalExtension();
                Storage::disk('ranter')->put('ranter/'.$gl_fileName, $gl_imageStream_sm->__toString());
            }else{
                $gl_fileName = null;
            }
              /************************/

            if($request->hasFile('guardian1Photo')){
                $g11_thumbs_sm = Image::make($request->file('guardian1Photo'));
                $g11_thumbs_sm->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $g11_thumbs_sm->resizeCanvas(300, 300, 'center', false, 'rgba(240, 240, 240, 240)');
                $g11_imageStream_sm = $g11_thumbs_sm->stream(request()->guardian1Photo->getClientOriginalExtension());
                $g11_fileName = 'g11_'.md5(date('y-m-d H:i:s')).'.'.request()->guardian1Photo->getClientOriginalExtension();
                Storage::disk('ranter')->put('ranter/'.$g11_fileName, $g11_imageStream_sm->__toString());
            }else{
                $g11_fileName = null;
            }
            //Image Upload

            $table->serialNo = ($maxValue + 1);
            $table->ranterType = $request->ranterType;
            $table->name = $request->name;
            $table->dob = db_date($request->dob);
            $table->contact = $request->contact;
            $table->email = $request->email;
            $table->nationality = $request->nationality;
            $table->nid = $request->nid;
            $table->birth_register = $request->birth_register;
            $table->passport = $request->passport;
            $table->religion = $request->religion;
            $table->bloodGroup = $request->bloodGroup;
            $table->maritalStatus = $request->maritalStatus;
            $table->address = $request->address;
            $table->occupation = $request->occupation;
            $table->photo = $fileName;

            $table->guardian = $request->guardian;
            $table->relations = $request->relations;
            $table->guardianContact = $request->guardianContact;
            $table->guardianOccupation = $request->guardianOccupation;
            $table->guardianNid = $request->guardianNid;
            $table->guardianAddress = $request->guardianAddress;
            $table->guardianPhoto = $g_fileName;

            $table->guardianLoc = $request->guardianLoc;
            $table->relationsLoc = $request->relationsLoc;
            $table->guardianContactLoc = $request->guardianContactLoc;
            $table->guardianOccupationLoc = $request->guardianOccupationLoc;
            $table->guardianNidLoc = $request->guardianNidLoc;
            $table->guardianAddressLoc = $request->guardianAddressLoc;
            $table->guardianPhotoLoc = $gl_fileName;

            $table->guardian1 = $request->guardian1;
            $table->relations1 = $request->relations1;
            $table->guardian1Contact = $request->guardian1Contact;
            $table->guardian1Occupation = $request->guardian1Occupation;
            $table->guardian1Nid = $request->guardian1Nid;
            $table->guardian1Address = $request->guardian1Address;
            $table->guardian1Photo = $g11_fileName;

            $table->school = $request->school;
            $table->groupSSC = $request->groupSSC;
            $table->classSSC = $request->classSSC;
            $table->rollSSC = $request->rollSSC;
            $table->sectionSSC = $request->sectionSSC;
            $table->classTimeSSC = $request->classTimeSSC;
            $table->boardSSC = $request->boardSSC;
            $table->passYearSSC = $request->passYearSSC;

            $table->college = $request->college;
            $table->groupHSC = $request->groupHSC;
            $table->rollHSC = $request->rollHSC;
            $table->sessionHSC = $request->sessionHSC;
            $table->boardHSC = $request->boardHSC;
            $table->passYearHSC = $request->passYearHSC;

            $table->universityHons = $request->universityHons;
            $table->subjectHons = $request->subjectHons;
            $table->semesterHons = $request->semesterHons;
            $table->studentIDHons = $request->studentIDHons;
            $table->yearsHons = $request->yearsHons;

            $table->universityMS = $request->universityMS;
            $table->subjectMS = $request->subjectMS;
            $table->semesterMS = $request->semesterMS;
            $table->studentIDMS = $request->studentIDMS;
            $table->yearsMS = $request->yearsMS;

            $table->institute = $request->institute;
            $table->subjectCo = $request->subjectCo;
            $table->classTimeCo = $request->classTimeCo;

            $table->company = $request->company;
            $table->employeeID = $request->employeeID;
            $table->designation = $request->designation;
            $table->officeLocation = $request->officeLocation;

            $table->discount = $request->discount;
            $table->adCharge = $request->adCharge;
            //$table->securityMoney = $request->securityMoney;
            $table->note = $request->note;
            $table->endDate = db_date($request->endDate);
            $table->created_at = db_date($request->created_at).' '.date('H:i:s');
            $table->save();
            $ranterID = $table->ranterID;

        if ($request->securityMoney > 0){
            $cashbook = new CashBook();
            $cashbook->amountIN = $request->securityMoney;
            $cashbook->transactionType = 'IN';
            $cashbook->sector = 'Security';
            $cashbook->refID = $ranterID;
            $cashbook->descriptions =  config('naz.renter_security');
            $cashbook->branchID = Auth::user()->branchID;
            $cashbook->created_at = db_date($request->created_at).' '.date('H:i:s');
            $cashbook->save();
        }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->to('ranter/show/'.$ranterID);

    }


    public function edit(Request $request){

        $table = Ranter::find($request->ranterID);

        if($table->productCode == Auth::user()->productCode) {

            DB::beginTransaction();
            try {

                //Image Upload
                if($request->hasFile('photo')){
                    
                    Storage::disk('ranter')->delete('ranter/'.$table->photo);//Del old image

                    $thumbs_sm = Image::make($request->file('photo'));
                    $thumbs_sm->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $thumbs_sm->resizeCanvas(300, 300, 'center', false, 'rgba(240, 240, 240, 240)');
                    $imageStream_sm = $thumbs_sm->stream(request()->photo->getClientOriginalExtension());
                    $fileName = md5(date('y-m-d H:i:s')).'.'.request()->photo->getClientOriginalExtension();
                    Storage::disk('ranter')->put('ranter/'.$fileName, $imageStream_sm->__toString());
                }else{
                    $fileName = $table->photo;
                }

                /************************/
                if($request->hasFile('guardianPhoto')){

                    Storage::disk('ranter')->delete('ranter/'.$table->guardianPhoto);//Del old image

                    $g_thumbs_sm = Image::make($request->file('guardianPhoto'));
                    $g_thumbs_sm->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $g_thumbs_sm->resizeCanvas(300, 300, 'center', false, 'rgba(240, 240, 240, 240)');
                    $g_imageStream_sm = $g_thumbs_sm->stream(request()->guardianPhoto->getClientOriginalExtension());
                    $g_fileName = 'g_'.md5(date('y-m-d H:i:s')).'.'.request()->guardianPhoto->getClientOriginalExtension();
                    Storage::disk('ranter')->put('ranter/'.$g_fileName, $g_imageStream_sm->__toString());
                }else{
                    $g_fileName = $table->guardianPhoto;
                }

                /************************/
                if($request->hasFile('guardianPhotoLoc')){

                    Storage::disk('ranter')->delete('ranter/'.$table->guardianPhotoLoc);//Del old image

                    $gl_thumbs_sm = Image::make($request->file('guardianPhotoLoc'));
                    $gl_thumbs_sm->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $gl_thumbs_sm->resizeCanvas(300, 300, 'center', false, 'rgba(240, 240, 240, 240)');
                    $gl_imageStream_sm = $gl_thumbs_sm->stream(request()->guardianPhotoLoc->getClientOriginalExtension());
                    $gl_fileName = 'gl_'.md5(date('y-m-d H:i:s')).'.'.request()->guardianPhotoLoc->getClientOriginalExtension();
                    Storage::disk('ranter')->put('ranter/'.$gl_fileName, $gl_imageStream_sm->__toString());
                }else{
                    $gl_fileName = $table->guardianPhotoLoc;
                }
                /************************/

                if($request->hasFile('guardian1Photo')){

                    Storage::disk('ranter')->delete('ranter/'.$table->guardian1Photo);//Del old image

                    $g11_thumbs_sm = Image::make($request->file('guardian1Photo'));
                    $g11_thumbs_sm->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $g11_thumbs_sm->resizeCanvas(300, 300, 'center', false, 'rgba(240, 240, 240, 240)');
                    $g11_imageStream_sm = $g11_thumbs_sm->stream(request()->guardian1Photo->getClientOriginalExtension());
                    $g11_fileName = 'g11_'.md5(date('y-m-d H:i:s')).'.'.request()->guardian1Photo->getClientOriginalExtension();
                    Storage::disk('ranter')->put('ranter/'.$g11_fileName, $g11_imageStream_sm->__toString());
                }else{
                    $g11_fileName = $table->guardian1Photo;
                }
                //Image Upload

                $table->ranterType = $request->ranterType;
                $table->name = $request->name;
                $table->dob = db_date($request->dob);
                $table->contact = $request->contact;
                $table->email = $request->email;
                $table->nationality = $request->nationality;
                $table->nid = $request->nid;
                $table->birth_register = $request->birth_register;
                $table->passport = $request->passport;
                $table->address = $request->address;
                $table->address = $request->address;
                $table->occupation = $request->occupation;
                $table->photo = $fileName;

                $table->guardian = $request->guardian;
                $table->relations = $request->relations;
                $table->guardianContact = $request->guardianContact;
                $table->guardianOccupation = $request->guardianOccupation;
                $table->guardianNid = $request->guardianNid;
                $table->guardianAddress = $request->guardianAddress;
                $table->guardianPhoto = $g_fileName;

                $table->guardianLoc = $request->guardianLoc;
                $table->relationsLoc = $request->relationsLoc;
                $table->guardianContactLoc = $request->guardianContactLoc;
                $table->guardianOccupationLoc = $request->guardianOccupationLoc;
                $table->guardianNidLoc = $request->guardianNidLoc;
                $table->guardianAddressLoc = $request->guardianAddressLoc;
                $table->guardianPhotoLoc = $gl_fileName;

                $table->guardian1 = $request->guardian1;
                $table->relations1 = $request->relations1;
                $table->guardian1Contact = $request->guardian1Contact;
                $table->guardian1Occupation = $request->guardian1Occupation;
                $table->guardian1Nid = $request->guardian1Nid;
                $table->guardian1Address = $request->guardian1Address;
                $table->guardian1Photo = $g11_fileName;

                $table->school = $request->school;
                $table->groupSSC = $request->groupSSC;
                $table->classSSC = $request->classSSC;
                $table->rollSSC = $request->rollSSC;
                $table->sectionSSC = $request->sectionSSC;
                $table->classTimeSSC = $request->classTimeSSC;
                $table->boardSSC = $request->boardSSC;
                $table->passYearSSC = $request->passYearSSC;

                $table->college = $request->college;
                $table->groupHSC = $request->groupHSC;
                $table->rollHSC = $request->rollHSC;
                $table->sessionHSC = $request->sessionHSC;
                $table->boardHSC = $request->boardHSC;
                $table->passYearHSC = $request->passYearHSC;

                $table->universityHons = $request->universityHons;
                $table->subjectHons = $request->subjectHons;
                $table->semesterHons = $request->semesterHons;
                $table->studentIDHons = $request->studentIDHons;
                $table->yearsHons = $request->yearsHons;

                $table->universityMS = $request->universityMS;
                $table->subjectMS = $request->subjectMS;
                $table->semesterMS = $request->semesterMS;
                $table->studentIDMS = $request->studentIDMS;
                $table->yearsMS = $request->yearsMS;

                $table->institute = $request->institute;
                $table->subjectCo = $request->subjectCo;
                $table->classTimeCo = $request->classTimeCo;

                $table->company = $request->company;
                $table->employeeID = $request->employeeID;
                $table->designation = $request->designation;
                $table->officeLocation = $request->officeLocation;

                $table->discount = $request->discount;
                $table->adCharge = $request->adCharge;
                //$table->securityMoney = $request->securityMoney;
                $table->note = $request->note;
                $table->created_at = db_date($request->created_at).' '.date('H:i:s');
                $table->save();
                $ranterID = $table->ranterID;

                if ($request->securityMoney > 0){
                    CashBook::where('sector', 'Security')->where('refID', $ranterID)->where('transactionType', 'IN')->update([
                        'amountIN' => $request->securityMoney,
                        'branchID' => Auth::user()->branchID,
                        'created_at' => db_date($request->created_at).' '.date('H:i:s')
                    ]);
                }else{
                    CashBook::where('sector', 'Security')->where('refID', $ranterID)->where('transactionType', 'IN')->delete();
                }

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

            return redirect()->to('ranter/show/'.$ranterID);

        }else{
            return view('errors.404');
        }
    }

    public function del($id){

        $table = Ranter::find($id);
        if($table->productCode == Auth::user()->productCode) {

            DB::beginTransaction();
            try {
                //remove from Seat
                 Seat::where('ranterID', $id)->update([
                    'ranterID' => null
                ]);
                //remove from Seat

                CashBook::where('sector', 'Security')->where('refID', $id)->where('transactionType', 'IN')->delete();

                Storage::disk('ranter')->delete('ranter/'.$table->photo);//Del old image
                Storage::disk('ranter')->delete('ranter/'.$table->guardianPhoto);//Del old image
                Storage::disk('ranter')->delete('ranter/'.$table->guardianPhotoLoc);//Del old image
                Storage::disk('ranter')->delete('ranter/'.$table->guardian1Photo);//Del old image

                $table->delete();

            DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

            return redirect()->back()->with(config('naz.del'));

        }else{
            return view('errors.404');
        }
    }
















}
