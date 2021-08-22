<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
class NewShopController extends Controller
{
    public function index () {
        $newShopProducts = Product::where('publication_status', 1)
                                    ->orderBy('id', 'DESC')
                                    ->take(4)
                                    ->get();
        $newProducts = Product::where('publication_status', 1)
                                    ->orderBy('id', 'ASC')
                                    ->skip(4)
                                    ->take(4)
                                    ->get();
        $bestSellingProducts = Product::where('publication_status', 1)
                                    ->orderBy('id', 'ASC')
                                    ->take(4)
                                    ->get();

        return view ('font-end.home.home', [
            'newShopProducts' => $newShopProducts,
            'newProducts' => $newProducts,
            'bestSellingProducts' => $bestSellingProducts
            ]);
        }
    public function categoryProduct ($id) {
        $categoryProducts = Product::where('category_id', $id)
                                    ->where('publication_status', 1)
                                    ->get();

        $categoryName = Category::find($id);

        return view ('font-end.category.category-content', [
            'categoryProducts' => $categoryProducts,
            'categoryName' => $categoryName
        ]);
    }
    public function detailsProduct ($id) {

        //Step 01
        
        // $product = Product::where('id', $id)
        //                         ->where('publication_status', 1)
        //                         ->first();

        // $category = $product->category_id;
        // $relatedProducts = Product::where('category_id', $category)
        //                                 ->where('id', '!=', $id)
        //                                 ->where('publication_status', 1)
        //                                 ->get();

        //Step 02

        $webProductDetails = Product::where('id',$id)
                                    ->where('publication_status', 1)
                                    ->first();
        $relatedProducts = Product::where('publication_status', 1)
                                    ->where('category_id', '=', $webProductDetails->id ? $webProductDetails->category_id : '')
                                    ->where('id', '!=', $webProductDetails->id)
                                    ->get();


                                            
        
        $product = Product::find($id);

        return view ('font-end.product.product-details', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
            ]);
        }
}
