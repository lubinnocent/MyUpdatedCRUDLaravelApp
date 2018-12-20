<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductsController extends Controller
{

    public function showProducts()
    {
        $products = Product::orderBy('created_at','desc')->paginate(5);
        return view('products.index')->with('products',$products);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['product_name' => 'required', 
                                    'product_price' => 'required',
                                    'cover_image' => 'image|nullable|max:1999'
                                   ]);

        $data = new Product();
        $data->name = $request->input('product_name');
        $data->price = $request->input('product_price');

        //lets now handle the image upload concept
        if($request->hasFile('cover_image'))
        {
        $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'.'.time().'.'.$extension;
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else
        {
        $fileNameToStore = "NoImage.jpg";
        }
        $data->image = $fileNameToStore;
        //dd($request->all());
        $data->save();
        return redirect('/show_products')->with('success',$request->input('product_name').' saved');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product',$product); 
    }

    
    public function updateProduct(Request $request)
    {
        $this->validate($request, ['product_name' => 'required', 
                                       'product_price' => 'required',
                                       'cover_image' => 'image|nullable|max:1999'
                                      ]);

        $data = Product::find($request->input('product_id'));
        $data->name = $request->input('product_name');
        $data->price = $request->input('product_price');
                          
        //lets now handle the image upload concept
        if($request->hasFile('cover_image'))
        {
        $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
                                      
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'.'.time().'.'.$extension;
                          
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        $data->image = $fileNameToStore;
        }
        else
        {
        $data->image = 'NoImage.jpg';
        }
        $data->save();
        return redirect('/show_products')->with('success',$request->input('product_name').' updated');                           
    }
   
    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        if($product->image != 'NoImage.jpg')
        {
        Storage::delete('public/cover_images/'.$product->image);
        }
        $product->delete();
        return redirect('/show_products')->with('success',$product->name. ' Deleted!');   
    }
}
