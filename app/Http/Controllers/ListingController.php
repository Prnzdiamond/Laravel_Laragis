<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Cache\TagSet;

class ListingController extends Controller
{
   public function index (){
   
    return view ('Listing.index', [
        'listings' => Listing::latest()->tagfilter(request(['tag','search']))->paginate(3)
    ]);
   }

   public function show ($list_id) {
     return view('Listing.show',[
        'listing' => Listing::find($list_id)
    ]);
   }

   public function create (){
    return view('Listing.create');
   }

   public function store(){
       $formData = request()->validate([
        'list_title' => 'required',
        'company' => 'required',
        'tags'=>'required',
        'location' => 'required',
        'email' => 'required|email',
        'website' => 'required',
        'description' => 'required',
        'logo'=> 'max:2048|image'
       ]);

       if(request()->hasFile('logo')){
        $image = request()->file('logo');
        $imagename = $formData['company'];
        $imageExt = $image->getClientOriginalExtension();
        $image_r_name = uniqid()."_".$imagename.".".$imageExt;
        $formData['logo'] = $image->storeAs('jobFiles/'.$imagename.'/',$image_r_name,'public');
       }

       Listing::create($formData);

      return redirect('/')->with('message','job posted sucessfully');
       
        
   }

   public function edit($list_id){
    return view('Listing.edit',[
        'listing' => Listing::findorfail($list_id)
    ]);
   }

   public function update($list_id){
     $updateData = request()->validate([
        'list_title' => 'required',
        'company' => 'required',
        'tags'=>'required',
        'location' => 'required',
        'email' => 'required|email',
        'website' => 'required',
        'description' => 'required',
        'logo'=> 'max:2048|image'
       ]);

       if(request()->hasFile('logo')){
        $image = request()->file('logo');
        $imageExt = $image->getClientOriginalExtension();
        $fileFolder = $updateData['company'];
        $imageName = uniqid().'_'.$fileFolder.".".$imageExt;
        $updateData['logo'] = $image->storeAs($fileFolder, $imageName,'public');
       }
       $listing = Listing::findOrFail($list_id);

       $listing->update($updateData);
       return redirect('/')->with('message','job updated sucessfully');
   }

   public function destroy($list_id){
    $listing= Listing::findorfail($list_id);
    $listing->delete();

    return redirect('/')->with('message','job has been Deleted');
   }

}
