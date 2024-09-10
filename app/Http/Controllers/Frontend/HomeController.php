<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Advertise;
use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use App\Models\Admin\CompanyStory;
use App\Models\Admin\ImageGallery;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use App\Models\Admin\Testimonial;
use App\Models\Banner;
use App\Models\Currency;
use App\Models\Language;
use App\Models\SeoSetting;
use App\Models\Setting;
use App\Models\Admin\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
{
    if (file_exists(storage_path('installed'))) {
        if (!Session::has('currency')) {
            Session::put('currency', Setting::where('slug', 'default_currency')->first()->value ?? 'USD');
        }
        $data['sliders'] = Slider::latest()->get();
        $data['banner'] = Banner::first();
        $data['offers'] = Offer::get();
        $data['promotion'] = Advertise::latest()->get();
        $data['blogs'] = Blog::with('tags')->latest()->get();
        $data['brands'] = Brand::latest()->get();
        $data['story'] = CompanyStory::latest()->get();
        $all_products = Product::with('brand', 'category', 'colors', 'sizes', 'product_tags')->latest();
        $data['products'] = $all_products->paginate(allsetting('home_products_page'));
        $data['on_sales'] = $all_products->where('On_Sale', ACTIVE)->paginate(allsetting('home_trending_page'));
        $data['featured_products'] = Product::where('Featured_Product', ACTIVE)->latest()->take(15)->get();
        $data['new_arrivals'] = Product::where('New_Arrival', ACTIVE)->latest()->take(3)->get();
        $data['best_sellings'] = Product::where('Best_Selling', ACTIVE)->latest()->take(6)->get();
        $data['testimonial'] = Testimonial::get();
        $seo = SeoSetting::where('slug', 'home')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
        return view('front.index', $data);
    } else {
        return redirect()->to('/install');
    }
}







    public function theme_set(Request $request)
    {
        if (env('APP_DEMO') == true) {
            session(['theme' => $request->theme]);
        }
        return redirect()->route('front');
    }
    public function localeSwitch($locale)
    {
        $lang = Language::where('locale', $locale)->first();
        session(['APP_LOCALE' => $locale, 'lang_dir' => $lang->direction]);
        return redirect()->back();
    }
    public function currencySwitch($currency)
    {
        Session::put('currency', $currency);
        return redirect()->back();
    }
}
