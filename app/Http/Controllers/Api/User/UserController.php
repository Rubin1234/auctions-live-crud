<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return [
            'users' => $users
            
        ];
    }

    public function updateOrCreate(Request $request)
    {
        $validated = $request->validate([
            'id' => 'bail|nullable|min:1',
            'name' => 'bail|required|string|max:50',
            'email' => 'bail|required|string|email|max:50|unique:users,email,' .$request['id'],
            'phone_number' => 'bail|required|string|min:10',
            'address' => 'bail|required|string|max:50',
            'country' => 'bail|required|string|max:50',
            'occupation' => 'bail|required|string|max:50',
        ]);

        User::updateOrCreate([ 'id' => $request['id']],$validated);

        return response()->noContent();
        
    }

    public function getUserDetails(Request $request){
        
        $request->validate([
            'id' => 'bail|required|min:1'
        ]);

       $user = User::where('id', $request['id'])->first();

       return [
        'user' => $user
       ];
        
    }

    public function deleteUser(Request $request){
        $request->validate([
            'id' => 'bail|required|min:1'
        ]);

       $user = User::where('id', $request['id'])->first();
       $user->delete();

       return [
            'message' => "User Deleted Successfully"
       ];
    }
}
