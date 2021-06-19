<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function add_brand()
    {
        return view('admin.brand.add-brand');
    }
    public function save_brand(Request $request)
    {
        $request->validate([
            'brand_name'=>'required'
        ]);
        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
        $brand->brand_slug=$this->slugGenerator($request->brand_name);
        $brand->save();
        $request->session()->flash('success', 'Brand Added Successfully');
        return back();
    }

    public function slugGenerator($string)
    {
        $string=str_replace('','-',$string);
        $string=preg_replace('/[^A-Za-z0-9\-]/','',$string);
        return strtolower(preg_replace('/-+/','-',$string));
    }
    public function manage_brand()
    {
        $brands=Brand::orderby('id','DESC')->get();
        return view('admin.brand.manage-brand',compact('brands'));
    }
    public function active_brand($id)
    {
       $brand=Brand::find($id);
       $brand->status=1;
       $brand->save();
       session()->flash('success', 'Brand active successfully');
       return back();

    }
    public function inactive_brand($id)
    {
        $brand=Brand::find($id);
        $brand->status=0;
        $brand->save();
        session()->flash('success', 'Brand inactive successfully');
        return back();
    }
    public function delete_brand($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        session()->flash('success', 'Brand Deleted successfully');
        return back();
    }
}
