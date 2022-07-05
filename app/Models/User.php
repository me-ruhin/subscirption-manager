<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'website_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $errors = [];

    /**
	 * It will store a new record to users table.
     *
	 * @param $data
     *
     *  @return \Illuminate\Http\Response
	 */
    public function subscribe($data)
    {
        $subscriptionStatus = $this->hasAlreadySubcribe($data['email'],$data['website_id']);
        if(!$subscriptionStatus){
            DB::beginTransaction();
            try{
            User::insert($data);
            DB::commit();
            return true;

            }catch(Exception $e){
                $this->errors['message']     = $e->getMessage();
                $this->errors['status_code'] = $e->getCode();
                DB::commit();
                return false;
            }
        }else{
            $this->errors['message']     = 'You have already subscribed!';
            $this->errors['status_code'] = 400;
            return false;

        }


    }

     /**
	 * It will check is the user already subcribed or not
     *
	 * @param $email, $website_id
     *
     *  @return  Boolean||Object
	 */

    public function hasAlreadySubcribe($email,$website_id){
        return User::where('email',$email)->where('website_id',$website_id)->first();
    }
}
