<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PitchController extends Controller
{
    /**
     * Get all pitches
     */
    public function index(Request $request)
    {
        $query = Pitch::with('club');
        
        // Club filter
        if ($request->has('club_id')) {
            $query->where('club_id', $request->club_id);
        }
        
        // Search filter
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        // Status filter (if you add a status field)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        
        // Pagination
        $perPage = $request->has('per_page') ? $request->per_page : 10;
        $pitches = $query->paginate($perPage);
        
        return response()->json([
            'success' => true,
            'data' => $pitches
        ]);
    }

    /**
     * Get single pitch
     */
    public function show($id)
    {
        $pitch = Pitch::with('club', 'reservations')->find($id);
        
        if (!$pitch) {
            return response()->json([
                'success' => false,
                'message' => 'Pitch not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $pitch
        ]);
    }

    /**
     * Create a new pitch
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'club_id' => 'required|exists:clubs,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price_per_hour' => 'nullable|numeric',
            'status' => 'nullable|in:available,maintenance,unavailable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only(['club_id', 'name', 'description', 'image_url','price_per_hour', 'status']);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('pitches', 'public');
        }

        $pitch = Pitch::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Pitch created successfully',
            'data' => $pitch
        ], 201);
    }

    /**
     * Update a pitch
     */
    public function update(Request $request, $id)
    {
        $pitch = Pitch::find($id);
        
        if (!$pitch) {
            return response()->json([
                'success' => false,
                'message' => 'Pitch not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'club_id' => 'sometimes|exists:clubs,id',
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'nullable|string|max:50',
            'capacity' => 'nullable|integer',
            'price_per_hour' => 'nullable|numeric',
            'status' => 'nullable|in:available,maintenance,unavailable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only(['club_id', 'name', 'description', 'type', 'capacity', 'price_per_hour', 'status']);
        
        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image
            if ($pitch->image_url) {
                Storage::disk('public')->delete($pitch->image_url);
            }
            $data['image_url'] = $request->file('image')->store('pitches', 'public');
        } elseif ($request->has('remove_image') && $request->remove_image) {
            // Handle image removal
            if ($pitch->image_url) {
                Storage::disk('public')->delete($pitch->image_url);
            }
            $data['image_url'] = null;
        }

        $pitch->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Pitch updated successfully',
            'data' => $pitch
        ]);
    }

    /**
     * Delete a pitch
     */
    public function destroy($id)
    {
        $pitch = Pitch::find($id);
        
        if (!$pitch) {
            return response()->json([
                'success' => false,
                'message' => 'Pitch not found'
            ], 404);
        }

        // Delete associated image
        if ($pitch->image_url) {
            Storage::disk('public')->delete($pitch->image_url);
        }

        $pitch->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pitch deleted successfully'
        ]);
    }

    /**
     * Get pitches for a specific club
     */
    public function getClubPitches($clubId)
    {
        $club = Club::find($clubId);
        
        if (!$club) {
            return response()->json([
                'success' => false,
                'message' => 'Club not found'
            ], 404);
        }

        $pitches = $club->pitches()->with('reservations')->get();
        
        return response()->json([
            'success' => true,
            'data' => $pitches
        ]);
    }


}