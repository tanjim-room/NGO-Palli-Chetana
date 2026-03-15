<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FundraisingCampaignController extends Controller
{
    public function index()
    {
        $campaigns = DB::table('fundraising_campaigns')->orderBy('created_at', 'desc')->get();
        return view('admin.fundraising_campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.fundraising_campaigns.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'goal_amount' => 'required|numeric|min:0',
            'raised_amount' => 'nullable|numeric|min:0',
            'image'       => 'required|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'status'      => 'required|in:active,completed,paused',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999) . '_campaign.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/fundraising_campaigns/'), $imageName);
        }

        DB::table('fundraising_campaigns')->insert([
            'title'        => $request->title,
            'description'  => $request->description,
            'goal_amount'  => $request->goal_amount,
            'raised_amount'=> $request->raised_amount ?? 0,
            'image'        => $imageName,
            'start_date'   => $request->start_date,
            'end_date'     => $request->end_date,
            'status'       => $request->status,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->back()->with('success', 'Fundraising Campaign created successfully');
    }

    public function edit($id)
    {
        $campaign = DB::table('fundraising_campaigns')->where('id', $id)->first();
        return view('admin.fundraising_campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $campaign = DB::table('fundraising_campaigns')->where('id', $id)->first();

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'goal_amount' => 'required|numeric|min:0',
            'raised_amount' => 'nullable|numeric|min:0',
            'image'       => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'status'      => 'required|in:active,completed,paused',
        ]);

        $imageName = $campaign->image;
        if ($image = $request->file('image')) {
            if (!empty($campaign->image)) {
                $oldImage = public_path('images/fundraising_campaigns/' . $campaign->image);
                if (file_exists($oldImage)) {
                    @unlink($oldImage);
                }
            }
            $imageName = rand(10000, 99999) . '_campaign.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/fundraising_campaigns/'), $imageName);
        }

        DB::table('fundraising_campaigns')->where('id', $id)->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'goal_amount'  => $request->goal_amount,
            'raised_amount'=> $request->raised_amount ?? $campaign->raised_amount,
            'image'        => $imageName,
            'start_date'   => $request->start_date,
            'end_date'     => $request->end_date,
            'status'       => $request->status,
            'updated_at'   => now(),
        ]);

        return redirect()->route('fundraising_campaigns.index')->with('success', 'Fundraising Campaign updated successfully');
    }

    public function destroy($id)
    {
        $campaign = DB::table('fundraising_campaigns')->where('id', $id)->first();

        if (!empty($campaign->image)) {
            $oldImage = public_path('images/fundraising_campaigns/' . $campaign->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }
        }

        DB::table('fundraising_campaigns')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Fundraising Campaign deleted successfully');
    }
}
