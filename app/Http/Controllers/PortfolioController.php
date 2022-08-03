<?php

namespace App\Http\Controllers;

use App\Models\About_area;
use App\Models\Award;
use App\Models\Award_Icon;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Blog_head;
use App\Models\Category;
use App\Models\Contact_header;
use App\Models\Counter;
use App\Models\Counter_bgphoto;
use App\Models\Education_Icon;
use App\Models\Educations;
use App\Models\Experience;
use App\Models\Experience_Icon;
use App\Models\Hire_area;
use App\Models\Portfolio_head;
use App\Models\Service;
use App\Models\Service_header;
use App\Models\Skill;
use App\Models\Skill_Icon;
use App\Models\Subcategory;
use App\Models\Team;
use App\Models\Team_header;
use App\Models\Testimonial;
use App\Models\Testimonial_header;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio-webpage.index',[
            'banners_all_data'=>Banner::latest()->get()->take(1),
            'about_all_data'=>About_area::latest()->get()->take(1),
            'Award_Icon'=>Award_Icon::first(),
            'Award_data'=>Award::latest()->get(),
            'education_Icon'=>Education_Icon::first(),
            'educations_data'=>Educations::latest()->get(),
            'experience_Icon'=>Experience_Icon::first(),
            'experience_data'=>Experience::latest()->get(),
            'skill_Icon'=>Skill_Icon::first(),
            'skill_data'=>Skill::get(),
            'service_header'=>Service_header::first(),
            'service_data'=>Service::get(),
            'counter_bgphoto'=>Counter_bgphoto::first(),
            'counter_data'=>Counter::all(),
            'Category_data'=>Category::all(),
            'Subcategory_data'=>Subcategory::all(),
            'portfolio_head'=>Portfolio_head::first(),
            'team_header'=>Team_header::first(),
            'team_data'=>Team::latest()->get()->take(3),
            'Hire_area'=>Hire_area::first(),
            'testimonial_header'=>Testimonial_header::first(),
            'Testimonial_data'=>Testimonial::all(),
            'contact_header'=>Contact_header::first(),
            'blog_all_data'=>Blog::latest()->get()->take(3),
            'blogHead_all_data'=>Blog_head::first(),
        ]);
    }
    // blog details code use start here
    public function blog_details($id)
    {
        $skill_data=Skill::all();
        $banners_all_data=Banner::latest()->get()->take(1);
        $blog_details_data=Blog::where('id',$id)->first();
        return view('portfolio-webpage.blog-details.index',compact('blog_details_data','banners_all_data','skill_data'));
    }
    // blog details code use end here

}
