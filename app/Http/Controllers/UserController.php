<?php

namespace App\Http\Controllers;

use  App\Http\Requests\CreateNewUser;
use  App\Http\Requests\UpdateUser;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        // foreach ($users as $user) {
        //     return $user->name;
        // }
        if($users ==Null){
        return response()->json([
            'success'=>true, 
            'message'=>'string', 
            'data'=>User::all(),
            
        ]);
    }else{
        return 'there is no data availabe';
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(CreateNewUser $request)
    {

           //code...
        //    $validatedData = $request->validated();
        //    \App\Validator::create($validatedData);
        return response()->json([
            'success'=>true, 
            'message'=>'Add Successfully', 
            'data'=>User::create($request->all()),
            
        ]);

        // return User::create($request->all());

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        //
        $user=User::find($id);
       
        if($user !=null){

            return response()->json([
                'success'=>true,
                'message'=>'Updated Successfully',
                'data'=>$user->update($request->all())
            ]);
        }else{
           return "This ID Not Found ";
        }
        

       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
       
        if($user !=null){

            return response()->json([
                'success'=>true,
                'message'=>'Deleted Successfully',
                'data'=>$user->delete()
            ]);
        }else{
           return "This ID Not Found ";
        }
        
    }
}
