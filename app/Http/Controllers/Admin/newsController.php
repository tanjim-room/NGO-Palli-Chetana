<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newsController extends Controller
{
    // add
    public function add()
    {
        return view('admin.latest_news.add');
    }
    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'images.*' => 'nullable|mimes:jpg,png,jpeg,gif',
        ]);

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = rand(10000,99999) . "news." . $image->getClientOriginalExtension();
            $image->move(public_path('images/news/'),$imageName);
        }

        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $galleryImage) {
                $galleryImageName = rand(100000, 999999) . "news_gallery." . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('images/news/'), $galleryImageName);
                $additionalImages[] = $galleryImageName;
            }
        }

        $news = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'additional_images' => !empty($additionalImages) ? json_encode($additionalImages) : null,
            'created_at' => now(),
            'updated_at' => now(),
        );

        DB::table('latest_news')->insert($news);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $news = DB::table('latest_news')->get();
        return view('admin.latest_news.index', compact('news'));
    }

    // Destroy
    public function destroy($id)
    {
        $news = DB::table('latest_news')->where('id',$id)->first();
        $oldIamgeName = public_path('images/news/'.$news->image);

        if(file_exists($oldIamgeName)){
            @unlink($oldIamgeName);
        }

        foreach (json_decode($news->additional_images ?? '[]', true) as $galleryImage) {
            $galleryImagePath = public_path('images/news/' . $galleryImage);
            if (file_exists($galleryImagePath)) {
                @unlink($galleryImagePath);
            }
        }

        DB::table('latest_news')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted News');
    }

    // Edit
    public function edit($id)
    {
        $news = DB::table('latest_news')->where('id', $id)->first();
        return view('admin.latest_news.edit', compact('news'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images.*' => 'nullable|mimes:jpg,png,jpeg,gif',
        ]);

        $news = DB::table('latest_news')->where('id',$id)->first();

        $imageName = '';
        $oldIamgeName = public_path('images/news/'.$news->image);

        if($image = $request->file('image')){
            if(file_exists($oldIamgeName)){
                @unlink($oldIamgeName);
            }
            $imageName = rand(10000,99999) . "news." . $image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
        }
        else{
            $imageName = $news->image;
        }

        $additionalImages = json_decode($news->additional_images ?? '[]', true);
        if ($request->hasFile('images')) {
            foreach ($additionalImages as $galleryImage) {
                $galleryImagePath = public_path('images/news/' . $galleryImage);
                if (file_exists($galleryImagePath)) {
                    @unlink($galleryImagePath);
                }
            }

            $additionalImages = [];
            foreach ($request->file('images') as $galleryImage) {
                $galleryImageName = rand(100000, 999999) . "news_gallery." . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('images/news'), $galleryImageName);
                $additionalImages[] = $galleryImageName;
            }
        }

        $news = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'additional_images' => !empty($additionalImages) ? json_encode($additionalImages) : null,
            'updated_at' => now(),
        );

        DB::table('latest_news')->where('id', $id)->update($news);
        return redirect()->back()->with('update', 'Successfully Updated News');
    }
}
