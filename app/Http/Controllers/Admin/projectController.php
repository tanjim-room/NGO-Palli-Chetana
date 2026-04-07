<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projectController extends Controller
{
    // add
    public function add(){
        return view('admin.ongoing_project.add');
    }
    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'images.*' => 'nullable|mimes:jpeg,png,jpg',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(1000000, 9999999) . "project." . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
        }

        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $galleryImage) {
                $galleryImageName = rand(100000, 999999) . "project_gallery." . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('images/project'), $galleryImageName);
                $additionalImages[] = $galleryImageName;
            }
        }

        $project = array(
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'additional_images' => !empty($additionalImages) ? json_encode($additionalImages) : null,
            );

        DB::table('ongoing_project')->insert($project);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index(){
        $project = DB::table('ongoing_project')->get();
        return view('admin.ongoing_project.index', compact('project'));
    }

    // Destroy
    public function destroy($id){
        $project = DB::table('ongoing_project')->where('id',$id)->first();
        $oldImageName = public_path('images/project/'.$project->image);

        if(file_exists($oldImageName)){
            @unlink($oldImageName);
        }

        foreach (json_decode($project->additional_images ?? '[]', true) as $galleryImage) {
            $galleryImagePath = public_path('images/project/' . $galleryImage);
            if (file_exists($galleryImagePath)) {
                @unlink($galleryImagePath);
            }
        }

        DB::table('ongoing_project')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted Project');
    }

    // Edit
    public function edit($id){
        $project = DB::table('ongoing_project')->where('id',$id)->first();
        return view('admin.ongoing_project.edit',compact('project'));
    }

    // Update
    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images.*' => 'nullable|mimes:jpeg,png,jpg',
        ]);

        $project = DB::table('ongoing_project')->where('id',$id)->first();

        $imageName = '';
        $oldImageName = public_path('images/project/'.$project->image);

        if($image = $request->file('image')){
            if(file_exists($oldImageName)){
                @unlink($oldImageName);
            }
            $imageName = rand(10000,99999). "project." . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'),$imageName);
        }
        else{
            $imageName = $project->image;
        }

        $additionalImages = json_decode($project->additional_images ?? '[]', true);
        if ($request->hasFile('images')) {
            foreach ($additionalImages as $galleryImage) {
                $galleryImagePath = public_path('images/project/' . $galleryImage);
                if (file_exists($galleryImagePath)) {
                    @unlink($galleryImagePath);
                }
            }

            $additionalImages = [];
            foreach ($request->file('images') as $galleryImage) {
                $galleryImageName = rand(100000, 999999) . "project_gallery." . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('images/project'), $galleryImageName);
                $additionalImages[] = $galleryImageName;
            }
        }

        $project = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'additional_images' => !empty($additionalImages) ? json_encode($additionalImages) : null
        );

        DB::table('ongoing_project')->where('id',$id)->update($project);
        return redirect()->back()->with('update', 'Successfully Updated data');
    }
}
