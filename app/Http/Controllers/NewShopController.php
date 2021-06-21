<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
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
        return view ('font-end.category.category-content', [
            'categoryProducts' => $categoryProducts
        ]);
    }
    public function detailsProduct ($id) {
        
        $product = Product::find($id);

        $relatedProducts = Product::where('publication_status', 1)
                                    ->orderBy('id', 'ASC')
                                    ->take(4)
                                    ->get();

        return view ('font-end.product.product-details', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
            ]);
        }
}
