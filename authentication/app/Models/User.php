<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model

{
    protected $table = 'account_newuser';
    
    protected $fillable = [
        'firstname',
        'lastname',
        'email', 
        'password', 
    ];
    
    public function setPassword($password)
    {
        $this->update([
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);    
    }
    
}