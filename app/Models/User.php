<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/12/4
 * Time: 23:50
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{

    protected $fillable = ['name', 'email', 'password', 'api_token'];

    protected $hidden = ['password', 'remember_token'];

}
