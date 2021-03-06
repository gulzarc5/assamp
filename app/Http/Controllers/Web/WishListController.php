<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class WishListController extends Controller
{
    public function addWishList($product_id)
    {
        $wishlist_cnt = DB::table('wishlist')
        	->where('user_id', Auth()->user()->id)
        	->where('product_id', $product_id)
        	->count();

        if ($wishlist_cnt < 1) {
        	DB::table('wishlist')
	        	->insert([
	        		'user_id' => Auth()->user()->id,
	        		'product_id' => $product_id
	        	]);
        }

        return redirect()->back();
    }

    public function wishList()
    {
        $wishlist = DB::table('wishlist')
        	->leftJoin('product', 'wishlist.product_id', '=', 'product.id')
            ->where('wishlist.user_id', Auth()->user()->id)
            ->where('product.status', 1)
        	->select('product.*')
            ->get();

        $header_color = DB::table('header_section')->first();

        return view('web.wishlist.wishlist', ['wishlist' => $wishlist, 'header_color' => $header_color]);
    }

    public function removeWishList($product_id)
    {
        DB::table('wishlist')
        	->where('user_id', Auth()->user()->id)
        	->where('product_id', $product_id)
        	->delete();

        return redirect()->back();
    }
}
