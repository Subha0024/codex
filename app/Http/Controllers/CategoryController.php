<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data=Category::get();
        return view('category.index',compact(('data')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,gif,png'
        ]);
            $params=$request->except('_token');

              $upload_image=$request->file('image');
              $image_name= time()."_".$upload_image->getClientOriginalName();
              $location="uploads/category/";
              $upload_image->move($location,$image_name);
              $filename=$location."".$image_name;
              $params['image']=$filename;


            Category::insert($params);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $data = Category::findOrFail($id);

        if(!empty($data->status)){
            Category::where('id', $id)->update(['status'=>0]);
            $message = "Deactivated succesfully";
        } else {
            Category::where('id', $id)->update(['status'=>1]);
            $message = "Activated succesfully";
        }
        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Category::find($id);
        return view('category.edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,jpg,gif,png'
        ]);

        $params=$request->except('_token');
        $data = Category::find($id);
        $image = $data->image;
        if(!empty($request->file('image'))){

            /* unlink old file */

            if(!empty($image)){
                if(File::exists($image)){
                    File::delete($image);
                }
            }

            /* Upload to storage */
            $upload_image=$request->file('image');
            $image_name= time()."_".$upload_image->getClientOriginalName();
            $location="uploads/category/";
            $upload_image->move($location,$image_name);
            $filename=$location."".$image_name;
            $params['image'] = $filename;
        } else {
            $params['image'] = $image;
            
        }
           

        $affected_rows=Category::where("id",$id)->update($params);
        
        \Session::flash('message','Update Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Category::find($id);
        $image = $data->image;
        if(!empty($image)){
            if(File::exists($image)){
                File::delete($image);
            }
        }
        $data=Category::find($id)->delete();
        \Session::flash('message','Delete Successfully');
        return redirect()->route('category.index'); 
       
    }
}









