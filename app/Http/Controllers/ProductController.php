<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use Image;
use DB;
class ProductController extends Controller
{
    public function index() {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();

        return view('admin.product.product-add', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    protected function productInfoValidate($request){
        $this->validate($request, [
            'product_name' => 'required'
        ]);
    }
    protected function productImageUpload($request){
        $productImage = $request->file('product_image');
        $fileType = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name.'.'.$fileType;
        $directory = 'product-image/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->save($imageUrl);
        return $imageUrl;
    }
    protected function productBasicInfoSave($request, $imageUrl){
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public function saveProduct(Request $request) {
        $this->productInfoValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->productBasicInfoSave($request, $imageUrl);

        return redirect('product/add')->with('message', 'Product Add Successfully');
    }
    public function manageProduct() {
        $products = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->join('brands', 'products.brand_id', '=', 'brands.id')
                        ->select('products.*', 'categories.category_name', 'brands.brand_name')
                        ->get();

        return view('admin.product.product-manage', [
            'products' => $products
        ]);
    }
    public function editProduct($id) {
        $product = Product::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();

        return view('admin.product.product-edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    protected function productBasicInfoUpdated($request, $product, $imageUrl=null){
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        if($imageUrl){
            $product->product_image = $imageUrl;
        }
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public function updateProduct(Request $request) {

        $productImage = $request->file('product_image');
        $product = Product::find($request->product_id);

        if($productImage){

            unlink($product->product_image);

            $imageUrl = $this->productImageUpload($request);

            $this->productBasicInfoUpdated($request, $product, $imageUrl);

        }else{

            $this->productBasicInfoUpdated($request, $product);
        
        }

        return redirect ('/product/manage')->with('message', 'Product Updated Successfully');
    }
}
