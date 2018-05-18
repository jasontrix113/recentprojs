<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projectModel extends Model

{
    protected $table = 'projects';
    
    protected $fillable = [        
        'pName',
        'pContactlist',
        'pContactName', 
        'pContactEmail',
        'pMCName', 
        'pMCEmail',
        'pMCPhone',
        'pMCCompany', 
    ];
    
}