<?php

namespace App\Http\Controllers;

use App\category;
use App\discount;
use App\news;
use App\orders;
use App\products;
use App\slide;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct()
    {
        $users = User::all();
        $sp = products::all();
        $cate = category::all();
        $slide = slide::all();
        $new = news::all();
        $discount = discount::all();
        $order = orders::all();
        view()-> share('users',$users);
        view()-> share('sp',$sp);
        view()-> share('cate',$cate);
        view()-> share('slide',$slide);
        view()-> share('new',$new);
        view()-> share('discount',$discount);
        view()-> share('order',$order);
    }
}
