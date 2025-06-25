<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    /**
     * Get all clubs
     */
    public function index(Request $request)
    {
        $query = Club::with('category');
        
        // Search filter
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        // Category filter
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        
        // Pagination
        $perPage = $request->has('per_page') ? $request->per_page : 10;
        $clubs = $query->paginate($perPage);
        
        return response()->json([
            'success' => true,
            'data' => $clubs
        ]);
    }

    /**
     * Get single club
     */
    public function show($id)
    {
        $club = Club::with('category', 'pitches')->find($id);
        
        if (!$club) {
            return response()->json([
                'success' => false,
                'message' => 'Club not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $club
        ]);
    }

    /**
     * Create a new club
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'club_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $imagePath = $request->file('club_photo')->store('clubs', 'public');

        $club = Club::create([
            'name' => $request->name,
            'address' => $request->address,
            'category_id' => $request->category_id,
            'club_photo' => $imagePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Club created successfully',
            'data' => $club
        ], 201);
    }

    /**
     * Update a club
     */
    public function update(Request $request, $id)
    {
        $club = Club::find($id);
        
        if (!$club) {
            return response()->json([
                'success' => false,
                'message' => 'Club not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:500',
            'category_id' => 'sometimes|exists:categories,id',
            'club_photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only(['name', 'address', 'category_id']);

        if ($request->hasFile('club_photo')) {
            // Delete old image
            if ($club->club_photo) {
                Storage::disk('public')->delete($club->club_photo);
            }
            
            $data['club_photo'] = $request->file('club_photo')->store('clubs', 'public');
        }

        $club->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Club updated successfully',
            'data' => $club
        ]);
    }

    /**
     * Delete a club
     */
    public function destroy($id)
    {
        $club = Club::find($id);
        
        if (!$club) {
            return response()->json([
                'success' => false,
                'message' => 'Club not found'
            ], 404);
        }

        // Delete associated image
        if ($club->club_photo) {
            Storage::disk('public')->delete($club->club_photo);
        }

        $club->delete();

        return response()->json([
            'success' => true,
            'message' => 'Club deleted successfully'
        ]);
    }

    /**
     * Get all categories (for selection in frontend)
     */
    public function categories()
    {
        $categories = Category::all();
        
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }
}