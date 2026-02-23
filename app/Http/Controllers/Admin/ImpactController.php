<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Impact;
use Illuminate\Http\Request;

class ImpactController extends Controller
{
    // add
    public function add()
    {
        return view('admin.impact.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'metric_value' => 'required|string|max:100',
            'metric_unit' => 'required|string|max:100',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'year' => 'nullable|integer|min:2000|max:2100',
            'order' => 'nullable|integer|min:0',
        ]);

        $iconName = null;
        if ($icon = $request->file('icon')) {
            $iconPath = public_path('images/impact/');
            if (!file_exists($iconPath)) {
                mkdir($iconPath, 0755, true);
            }
            $iconName = rand(100000, 999999) . '_icon.' . $icon->getClientOriginalExtension();
            $icon->move($iconPath, $iconName);
        }

        Impact::create([
            'title' => $request->title,
            'metric_value' => $request->metric_value,
            'metric_unit' => $request->metric_unit,
            'description' => $request->description,
            'icon' => $iconName,
            'year' => $request->year,
            'order' => $request->order ?? 0
        ]);

        return redirect()->back()->with('success', 'Impact metric successfully added!');
    }

    // index
    public function index()
    {
        $data = Impact::orderBy('order', 'asc')
                     ->orderBy('created_at', 'desc')
                     ->get();
        return view('admin.impact.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        $impact = Impact::findOrFail($id);
        // Delete icon file
        if (!empty($impact->icon) && file_exists(public_path('images/impact/' . $impact->icon))) {
            @unlink(public_path('images/impact/' . $impact->icon));
        }
        $impact->delete();
        
        return redirect()->back()->with('success', 'Impact metric successfully deleted!');
    }

    // Edit
    public function edit($id)
    {
        $data = Impact::findOrFail($id);
        return view('admin.impact.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'metric_value' => 'required|string|max:100',
            'metric_unit' => 'required|string|max:100',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'year' => 'nullable|integer|min:2000|max:2100',
            'order' => 'nullable|integer|min:0',
        ]);

        $impact = Impact::findOrFail($id);

        $iconName = $impact->icon; // keep existing
        if ($icon = $request->file('icon')) {
            // Delete old icon
            if (!empty($impact->icon) && file_exists(public_path('images/impact/' . $impact->icon))) {
                @unlink(public_path('images/impact/' . $impact->icon));
            }
            $iconPath = public_path('images/impact/');
            if (!file_exists($iconPath)) {
                mkdir($iconPath, 0755, true);
            }
            $iconName = rand(100000, 999999) . '_icon.' . $icon->getClientOriginalExtension();
            $icon->move($iconPath, $iconName);
        }

        $impact->update([
            'title' => $request->title,
            'metric_value' => $request->metric_value,
            'metric_unit' => $request->metric_unit,
            'description' => $request->description,
            'icon' => $iconName,
            'year' => $request->year,
            'order' => $request->order ?? 0
        ]);

        return redirect()->back()->with('update', 'Impact metric successfully updated!');
    }
}

