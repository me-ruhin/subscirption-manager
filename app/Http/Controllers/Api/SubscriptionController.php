<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;

class SubscriptionController extends Controller
{
    public $user;

    public function __construct(User $userObj)
    {
        $this->user = $userObj;

    }

    /**
	 * It will a new record as a subscriber to users table.
     *
	 * @param Request $request
     *
     * @return \Illuminate\Http\Response
	 */
    public  function store(SubscriptionRequest $request)
    {
       $result =  $this->user->subscribe($request->all());

       if(!$result){
            return response()->json(['message'=>$this->user->errors['message'],'status_code'=>$this->user->errors['status_code']]);
       }

       return response()->json(['message'=>'You have successfully subscribed!']);

    }


}
