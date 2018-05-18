<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactModel extends Model

{
    protected $table = 'contacts';
    
    protected $fillable = [        
        'contact_Name',
        'contact_defEmail',
        'contact_defName', 
        'contact_company',
        'contact_address',
        'contact_city',
        'contact_zipcode',
        'contact_country',
        'contact_phone',
    ];
    
}