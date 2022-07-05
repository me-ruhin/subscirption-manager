<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["title","description","website_id"];


    public $errors = [];

    /**
	 * It will store the post.
     *
	 * @param $data
     *
     *  @return \Illuminate\Http\Response
	 */
    public function store($data){
       try{

           DB::beginTransaction();
           Post::create($data);
           DB::commit();
           return true;

       }catch(Exception $e){
        $this->errors['message']     = $e->getMessage();
        $this->errors['status_code'] = $e->getCode();
        DB::rollBack();
        return false;

       }

    }


}
