<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
                // Use the paginate method to paginate users, with a default of 10 users per page
                $users = User::paginate(10);

                // Return the paginated response
                return response()->json($users);
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404); 
        }

        $user->role = $request->input('role');
        $user->save();

        return response()->json(['message' => 'User role updated successfully', 'user' => $user], 200);
    }

    public function destroy($id) 
    { 
        Log::info('Attempting to delete user', ['id' => $id]);
        
        $user = User::find($id); 
        
        if (!$user) { 
            Log::warning('User not found', ['id' => $id]); 
            return response()->json(['message' => 'User not found'], 404); 
        }
        
        $user->delete(); 
        Log::info('User deleted successfully', ['id' => $id]); 
        
        return response()->json(['message' => 'User deleted successfully'], 200); 
    }

}
