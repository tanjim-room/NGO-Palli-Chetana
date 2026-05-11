<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FocusAreaController extends Controller
{
    public function index()
    {
        $focus_areas = DB::table('focus_areas')
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.focus_areas.index', compact('focus_areas'));
    }

    public function create()
    {
        return view('admin.focus_areas.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|max:2048',
            'image' => 'nullable|image|max:2048',
            'order' => 'required|integer|min:0|unique:focus_areas,order',
            'is_active' => 'nullable|boolean',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconFile = $request->file('icon');
            $iconName = uniqid() . '_' . preg_replace('/\s+/', '_', $iconFile->getClientOriginalName());
            $iconFile->move(public_path('images/focus_areas/icons'), $iconName);
            $iconPath = 'focus_areas/icons/' . $iconName;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = uniqid() . '_' . preg_replace('/\s+/', '_', $imageFile->getClientOriginalName());
            $imageFile->move(public_path('images/focus_areas'), $imageName);
            $imagePath = 'focus_areas/' . $imageName;
        }

        DB::table('focus_areas')->insert([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'icon_path' => $iconPath,
            'image_path' => $imagePath,
            'order' => $validated['order'] ?? 0,
            'is_active' => (bool)($validated['is_active'] ?? true),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area added successfully');
    }

    public function edit($id)
    {
        $focus_area = DB::table('focus_areas')->where('id', $id)->first();
        if (!$focus_area) {
            return redirect()->route('admin.focus_areas.index')->with('error', 'Focus Area not found');
        }

        return view('admin.focus_areas.edit', compact('focus_area'));
    }

    public function update(Request $request, $id)
    {
        $focus_area = DB::table('focus_areas')->where('id', $id)->first();
        if (!$focus_area) {
            return redirect()->route('admin.focus_areas.index')->with('error', 'Focus Area not found');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|max:2048',
            'image' => 'nullable|image|max:2048',
            'order' => 'required|integer|min:0|unique:focus_areas,order,' . $id,
            'is_active' => 'nullable|boolean',
            'remove_icon' => 'nullable|boolean',
            'remove_image' => 'nullable|boolean',
        ]);

        $iconPath = $focus_area->icon_path ?? null;

        if (!empty($validated['remove_icon'])) {
            if ($iconPath) {
                $iconFilePath = public_path('images/' . ltrim($iconPath, '/'));
                if (file_exists($iconFilePath)) {
                    @unlink($iconFilePath);
                }
            }
            $iconPath = null;
        }

        if ($request->hasFile('icon')) {
            if ($iconPath) {
                $oldIconFilePath = public_path('images/' . ltrim($iconPath, '/'));
                if (file_exists($oldIconFilePath)) {
                    @unlink($oldIconFilePath);
                }
            }
            $iconFile = $request->file('icon');
            $iconName = uniqid() . '_' . preg_replace('/\s+/', '_', $iconFile->getClientOriginalName());
            $iconFile->move(public_path('images/focus_areas/icons'), $iconName);
            $iconPath = 'focus_areas/icons/' . $iconName;
        }

        $imagePath = $focus_area->image_path;

        if (!empty($validated['remove_image'])) {
            if ($imagePath) {
                $imageFilePath = public_path('images/' . ltrim($imagePath, '/'));
                if (file_exists($imageFilePath)) {
                    @unlink($imageFilePath);
                }
            }
            $imagePath = null;
        }

        if ($request->hasFile('image')) {
            if ($imagePath) {
                $oldImageFilePath = public_path('images/' . ltrim($imagePath, '/'));
                if (file_exists($oldImageFilePath)) {
                    @unlink($oldImageFilePath);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid() . '_' . preg_replace('/\s+/', '_', $imageFile->getClientOriginalName());
            $imageFile->move(public_path('images/focus_areas'), $imageName);
            $imagePath = 'focus_areas/' . $imageName;
        }

        DB::table('focus_areas')->where('id', $id)->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'icon_path' => $iconPath,
            'image_path' => $imagePath,
            'order' => $validated['order'] ?? 0,
            'is_active' => (bool)($validated['is_active'] ?? false),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area updated successfully');
    }

    public function destroy($id)
    {
        $focus_area = DB::table('focus_areas')->where('id', $id)->first();
        if (!$focus_area) {
            return redirect()->route('admin.focus_areas.index')->with('error', 'Focus Area not found');
        }

        if (!empty($focus_area->icon_path)) {
            $iconFilePath = public_path('images/' . ltrim($focus_area->icon_path, '/'));
            if (file_exists($iconFilePath)) {
                @unlink($iconFilePath);
            }
        }

        if ($focus_area->image_path) {
            $imageFilePath = public_path('images/' . ltrim($focus_area->image_path, '/'));
            if (file_exists($imageFilePath)) {
                @unlink($imageFilePath);
            }
        }

        DB::table('focus_areas')->where('id', $id)->delete();

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area deleted successfully');
    }
}
