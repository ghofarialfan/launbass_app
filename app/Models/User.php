<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'User';       // change if your table name differs (e.g. 'users')
    protected $primaryKey = 'IDUser';// change if PK differs
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;      // set to true if your table has created_at/updated_at

    protected $fillable = [
        'Nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
