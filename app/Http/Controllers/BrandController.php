<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //add brND
    public function add_brand()
    {
        return view('admin.brand.add-brand');
    }
    public function save_brand(Request $request)
    {
        $request->validate([
            'brand_name'=>'required|unique:brands,brand_name'
        ]);
        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
        $brand->brand_slug=$this->slugGenerator($request->brand_name);
        $brand->save();
        $request->session()->flash('success', 'Brand Added Successfully');
        return back();
    }
    //slug generator
    public function slugGenerator($string)
    {
        $string=str_replace('','-',$string);
        $string=preg_replace('/[^A-Za-z0-9\-]/','',$string);
        return strtolower(preg_replace('/-+/','-',$string));
    }
    //manage brand
    public function manage_brand()
    {
        $brands=Brand::orderby('id','DESC')->get();
        return view('admin.brand.manage-brand',compact('brands'));
    }

    public function brandStatus($id,$status)
    {
       $brand=Brand::find($id);
       $brand->status=$status;
       $brand->save();
       return back();
       return response()->json(['messsage'=>'success']);

    }

    public function delete_brand($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        session()->flash('success', 'Brand Deleted successfully');
        return back();
    }
    //edit brand
    public function edit_brand($id)
    {
        $brand=Brand::find($id);
        return view('admin.brand.edit-brand',compact('brand'));
    }
    public function update_brand(Request $request)
    {
        $request->validate([
            'brand_name'=>'required|unique:brands,brand_name'
        ]);
        $brand=Brand::find($request->id);
        $brand->brand_name=$request->brand_name;
        $brand->brand_slug=$this->slugGenerator($request->brand_name);
        $brand->save();
        session()->flash('success', 'Brand update successfully');
        return back();
    }

}
