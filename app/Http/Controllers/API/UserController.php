<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Http\Requests\StoreUserLogin as StoreUserLogin;
use App\Http\Requests\StoreUserRegister as StoreUserRegister;

use App\User; 

class UserController extends BaseController
{
    public $successStatus = 200;
    public $errorUnauthorised = 401;
    public $errorInternalServer = 500;
    public $errorUnprocessableEntity = 422;

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(StoreUserLogin $request){ 
        try {
            // $credentials = request(['email', 'password']);
            $credentials = $request->all();

            if (!Auth::attempt($credentials)) {
                return $this->sendError('Acesso não autorizado.', '', $this->errorUnauthorised);
            } else {
                $user = $request->user();
                $tokenResult = $user->createToken('PNA-Publicidade');
                $token = $tokenResult->token;
                
                $token->expires_at = Carbon::now();//->addSeconds(3630);
                //return Carbon::now();
        
                if ($request->remember_me) {
                    //$token->expires_at = Carbon::now()->addMinutes(0);
                }
                $token->save();

                return [
                    'token' => $tokenResult->accessToken,
                    'user_email' => $request['email'],
                    'token_type'   => 'Bearer',
                    'expires_at'   => Carbon::parse(
                    $tokenResult->token->expires_at)
                    ->toDateTimeString(),
                    'status_code' => $this->successStatus
                ];
            }
        } catch (\Exception $e) {
            if(env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorUnauthorised); 
            }
            return $this->sendError('Usuário não foi criado!', '', $this->errorInternalServer); 
        } 
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(StoreUserRegister $request) 
    { 
        try {

            $validated = $request->validated();
            
            $input = $request->all(); 
            $input['password'] = bcrypt($input['password']); 
            //dd($input);
            $user = $this->user->create($input);
            $success['token'] =  $user->createToken('PNA-Publicidade')->accessToken; 
            $success['name'] =  $user->name;
            $email['email'] =  $user->email;

            return $this->sendSuccess($success, '', $this->successStatus);
        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorUnauthorised);
            }
            return $this->sendError('Usuário não foi criado!', '', $this->errorInternalServer);
        }

        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                 
        try{

            $data = $request->input();  
           
            foreach ($data as $key => $value) {
                
                $this->result_show = $this->user
                ->where( $key, 'LIKE', '%' . $value . '%')
                ->paginate(5);
            }
            
            $success = $this->result_show;
            return $this->sendSuccess($success, '', $this->successStatus);

        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorInternalServer);
            }
            return $this->sendError('Usuário não foi encontrado!', '', $this->errorInternalServer);
        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  string
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {           
        try{
             return $user = Auth::user();
            $data = $request->input(); 
            
            $id_key = array_keys($data)[0];
            $id_value = array_values($data)[0];

            if ($id_key == "id") {
                $this->result_show = $this->user
                ->findOrFail($id_value);
    
                $success = $this->result_show;
                return $this->sendSuccess($success, '', $this->successStatus);
            } else {
                return $this->sendError('Usuário não foi encontrado!', '', $this->errorUnauthorised);
            }

        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorUnauthorised);
            }
            return $this->sendError('Usuário não foi encontrado!', '', $this->errorUnauthorised);
        }

    }
}
