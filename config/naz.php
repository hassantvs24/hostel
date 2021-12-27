<?php

return [
	'app_name' => 'Bill Express',
    'version' => '1.1.0',
    'pre_day' => '-100 day',
    'pre_day_h' => '-182 day',
    'no_data' => ['message' => 'Oh! No product list here.',  'alert-type' => 'error'],
    'not_happen' => ['message' => 'Oh! No nothing to happened here.',  'alert-type' => 'error'],
    'not_del_item' => ['message' => 'Oh! No nothing to happened here. Because Only one item remaining. Please Delete whole invoice. If you want!!',  'alert-type' => 'error'],
    'all_success' => ['message' => 'It Works Well! Operation complete Successfully',  'alert-type' => 'success'],

    'process_success' => ['message' => 'It Works Well! Order Send to process Successfully',  'alert-type' => 'success'],
    'cancel_order' => ['message' => 'It Works Well! Order Cancel Successfully',  'alert-type' => 'success'],
    'complete_success' => ['message' => 'It Works Well! Order processing complete Successfully',  'alert-type' => 'success'],

    'process' => 'Processing',
    'pending' => 'Pending',
    'complete' => 'Complete',
	
	'save' => ['message' => 'It Works Well! Save Data Successfully',  'alert-type' => 'success'],
    'edit' => ['message' => 'It Works Well! Edit Data Successfully',  'alert-type' => 'success'],
    'del' => ['message' => 'It Works Well! Delete Data Successfully',  'alert-type' => 'success'],
    'error' => ['message' => 'Oh! Something error here.',  'alert-type' => 'error'],

    'watermark' => 'sodaighor.com',
    'bill_generate' => 'Bill Generate Has Been Successfully Generate',



    //Start: Company Info
    'logo' => 'logo.png',
    'company' =>'Leading University',
    'address' =>'Ragibnagar, Kamal Bazar, Sylhet - 3100',
    'city' =>'Sylhet',
    'postCode' =>'3100',
    'country' =>'Bangladesh',
    'email' =>'info@sodaighor.com',
    'contact' =>'+8801611024695',
    //'web' =>'www.sodaighor.com',
    //End: Company Info

    'invoice_other_info' => 'Thank you for using choosing us. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',

    //Description for cash/bank book
    'renter_security' => 'Security Money',
    'bill_gen' => 'Bill Generate',
    'collect' => 'Bill Collect',
    'bill_return' => 'Bill Return',
    'admission' => 'Admission Fee',
    'security' => 'Security Money',

    'sale_dis' => 'Sale product',
    'purchase_dis' => 'Purchase product',
    'report' => 'Other Income',
    'expanse' => 'Other Expanse',
    'asset_buy' => 'Asset Purchase',
    'asset_sale' => 'Sale Asset',
    'invest_in' => 'Investment',
    'invest_out' => 'Withdraw Investment',
    //Description for cash/bank book

    'expire' => 22022,
    'max_attempted' => 10,
    'salt' => 'my*name%is!nazmu1',
    'salt_re' => 'nadu%!o256b*te',


    'stock_warning' => 10, //Minimum Stock Warning in notification

];
