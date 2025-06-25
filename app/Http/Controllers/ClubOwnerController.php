<?php

namespace App\Http\Controllers;

use App\Models\ClubOwner;
use App\Models\User;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubOwnerController extends Controller
{
    /**
     * Get all club owners
     */
    public function index(Request $request)
    {
        $query = ClubOwner::with(['user', 'club']);
        
        // Search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }
        
        // Club filter
        if ($request->has('club_id')) {
            $query->where('club_id', $request->club_id);
        }
        
        // Status filter
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        
        // Pagination
        $perPage = $request->has('per_page') ? $request->per_page : 10;
        $owners = $query->paginate($perPage);
        
        return response()->json([
            'success' => true,
            'data' => $owners
        ]);
    }

    /**
     * Get single club owner
     */
    public function show($id)
    {
        $owner = ClubOwner::with(['user', 'club'])->find($id);
        
        if (!$owner) {
            return response()->json([
                'success' => false,
                'message' => 'Club owner not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $owner
        ]);
    }

    /**
     * Create a new club owner
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'club_id' => 'required|exists:clubs,id',
            'status' => 'sometimes|in:active,pending,suspended',
            'permissions' => 'sometimes|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Check if user is already an owner of this club
        $existingOwner = ClubOwner::where('user_id', $request->user_id)
            ->where('club_id', $request->club_id)
            ->first();
            
        if ($existingOwner) {
            return response()->json([
                'success' => false,
                'message' => 'This user is already an owner of this club'
            ], 409);
        }

        $owner = ClubOwner::create([
            'user_id' => $request->user_id,
            'club_id' => $request->club_id,
            'status' => $request->status ?? 'active',
            'permissions' => $request->permissions ?? []
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Club owner created successfully',
            'data' => $owner->load(['user', 'club'])
        ], 201);
    }

    /**
     * Update a club owner
     */
    public function update(Request $request, $id)
    {
        $owner = ClubOwner::find($id);
        
        if (!$owner) {
            return response()->json([
                'success' => false,
                'message' => 'Club owner not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'sometimes|in:active,pending,suspended',
            'permissions' => 'sometimes|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $owner->update([
            'status' => $request->has('status') ? $request->status : $owner->status,
            'permissions' => $request->has('permissions') ? $request->permissions : $owner->permissions
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Club owner updated successfully',
            'data' => $owner->load(['user', 'club'])
        ]);
    }

    /**
     * Delete a club owner
     */
    public function destroy($id)
    {
        $owner = ClubOwner::find($id);
        
        if (!$owner) {
            return response()->json([
                'success' => false,
                'message' => 'Club owner not found'
            ], 404);
        }

        $owner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Club owner deleted successfully'
        ]);
    }

    /**
     * Get owners for a specific club
     */
    public function getClubOwners($clubId)
    {
        $owners = ClubOwner::with('user')
            ->where('club_id', $clubId)
            ->get();
            
        return response()->json([
            'success' => true,
            'data' => $owners
        ]);
    }

    /**
     * Get clubs owned by a specific user
     */
    public function getUserOwnedClubs($userId)
    {
        $clubs = ClubOwner::with('club')
            ->where('user_id', $userId)
            ->get()
            ->pluck('club');
            
        return response()->json([
            'success' => true,
            'data' => $clubs
        ]);
    }
}