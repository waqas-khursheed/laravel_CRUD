<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use Validator;
class FeeController extends Controller
{

   /*
    |--------------------------------------------------------------------------
    | Refresh
    |--------------------------------------------------------------------------
    */
    public function refresh(Request $request){

        $view = 'feetype.FeeTypeRead';

        $user['page_data'] = array();
        $feeTypeModel = new Fee();
        $user['page_data'] = $feeTypeModel->getFeeType();

        return \View::make($view)->with('user', $user);
       
    }

    /*
    |--------------------------------------------------------------------------
    | Add
    |--------------------------------------------------------------------------
    */
    public function addForm(){

        $view = 'feetype/FeeTypeCreate';
        return \View::make($view);
    }


    public function add(Request $request){
        $errorMsgs = [
			'name.required' => 'req name',
			'name.min' => 'req name char',
            'dname.required' => 'req dname',
            'dname.min' =>  'req dname char',
            'code' => 'req code',
           
		];
		$validator = Validator::make($request->all(), [
            'name'=>'required|min:3',
            'dname'=>'required|min:3',
            'code' => 'required',
            
		], $errorMsgs);
		
		if($validator->passes()){
	
            $feeTypeModel = new Fee();
            $feeTypeModel->addNewFeeType($request->all());
            return response()->json(['success'=>'New record added']);
		
		}else{
			$returnData = array(
				'status' => 'error',
				'message' => 'Please review fields',
				'errors' => $validator->errors()->all()
			);
			return response()->json($returnData, 500);
		}
    }
 

    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */
    public function editForm(Request $request){
        $id = $request->id;
        $view = 'feetype.FeeTypeUpdate';
        $fee = Fee::find($id);;
        //$fee = $feeTypeModel->getFeeType();

        return view('feetype.FeeTypeUpdate', compact($fee));
      
    }
    public function edit(){
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    public function deleteForm(){
        $userModel = new UserModel();
        $user['rights'] = $userModel->getUserAccessRights($this->menuID);

        if($user['rights'][0]->can_delete == 0){
            return \View::make('smart/unauthorize/AccessDenied');
        }else{
            $view = 'smart/student/feetype/feetype/FeeTypeDelete';
            
            $user['page_data'] = array();
            $feeTypeModel = new StudentFeeTypeModel();
            $user['page_data'] = $feeTypeModel->getFeeType();
        
            return \View::make($view)->with('user', $user);
        }
    }
    public function delete(){
    
    }

    /*
    |--------------------------------------------------------------------------
    | Rollback
    |--------------------------------------------------------------------------
    */
    public function rollbackForm(){
        $userModel = new UserModel();
        $user['rights'] = $userModel->getUserAccessRights($this->menuID);

        if($user['rights'][0]->can_roll_back == 0){
            return \View::make('smart/unauthorize/AccessDenied');
        }else{
            $view = 'smart/student/feetype/feetype/FeeTypeRollback';

            $user['page_data'] = array();
            $feeTypeModel = new StudentFeeTypeModel();
            $user['page_data'] = $feeTypeModel->getDeletedFeeType();

            return \View::make($view)->with('user', $user);
        }
    }
    public function rollback(){
    
    }


    
}
