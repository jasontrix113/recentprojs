<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emailModel extends Model

{
    protected $table = 'email';
    
    protected $fillable = [        
        'eContactlist',
        'recipients',
        'templates', 
        'subject',
        'message', 
    ];
}