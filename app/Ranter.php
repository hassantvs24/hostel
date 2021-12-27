<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranter extends Model
{
    protected $table = 'ranter';
    protected $primaryKey = 'ranterID';
    protected $fillable = [
        'serialNo', 'ranterType', 'name', 'dob', 'religion', 'bloodGroup', 'email', 'contact', 'nid', 'birth_register',
        'passport', 'nationality', 'occupation', 'maritalStatus', 'address', 'photo', 'guardian', 'relations',
        'guardianContact', 'guardianOccupation', 'guardianNid', 'guardianAddress', 'guardianPhoto', 'guardian1',
        'relations1', 'guardian1Contact', 'guardian1Occupation', 'guardian1Nid', 'guardian1Address', 'guardian1Photo',
        'guardianLoc', 'relationsLoc', 'guardianContactLoc', 'guardianOccupationLoc', 'guardianNidLoc', 'guardianAddressLoc',
        'guardianAddressLoc', 'guardianPhotoLoc', 'school', 'groupSSC', 'classSSC', 'rollSSC', 'sectionSSC', 'classTimeSSC',
        'boardSSC', 'passYearSSC', 'college', 'groupHSC', 'sessionHSC', 'rollHSC', 'boardHSC', 'passYearHSC', 'universityHons',
        'subjectHons', 'semesterHons', 'studentIDHons', 'yearsHons', 'universityMS', 'subjectMS', 'semesterMS', 'studentIDMS',
        'yearsMS', 'company', 'employeeID', 'designation', 'officeLocation', 'securityMoney',
        'institute','subjectCo', 'classTimeCo', 'discount', 'adCharge', 'due', 'note', 'endDate', 'status', 'productCode', 'userID'
    ];
    public function seat($ranterID){
        $table = Seat::where('ranterID',$ranterID)->first();
        return $table;
    }
    public  function total_pay($ranterID){
        $table = CashBook::where('sector', 'Collection')->where('refID', $ranterID)->where('transactionType', 'IN')->sum('amountIN');
        return $table;
    }
    public  function total_bill(){
        return $this->hasMany('App\Billing','ranterID');
    }
}
