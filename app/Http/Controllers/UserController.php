<?php

namespace App\Http\Controllers;

//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Validation\Validator;


class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user=User::find($request->user()->id);
        foreach ($user->builder as $builuder){
           $biluders= builder::find($builuder->id)->with('gender','automode','watermode')->get();
        }
    return response()->json(array('user'=>$user),'200');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @tparam int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*** Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        $user = User::where('phonenumber', $request->phonenumber)
        ->first();
        if($user){
            if (Hash::check($request->password, $user->password)) {
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);

            } else {
                $response = ['Password incorrect'];
                return response($response, 422);
            }
        }else {
            $response = ['User doesn\'t exist'];
            return response($response, 422);
        }
    }
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'phonenumber' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

       // if there is some error's, show  to user
        if ($validator->fails()) {
            return response()->json([$validator->errors()->merge(['code'=>500])],500);
        }
        $input['password']=Hash::make($input['password']);
        $user = User::create($input);
        $token = $user->createToken('NewToken')->accessToken;
        return response()->json([
            'password'=>$input['password'],
            'token' => $token,
        ], 201);
    }
//TODO send code by sms

}
