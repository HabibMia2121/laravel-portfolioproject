<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutAreaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactAreaController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\FooterIconController;
use App\Http\Controllers\SearchController;

// search route start
Route::get('search', [SearchController::class,'search'])->name('search');
// search route end

// authentication route start
Auth::routes(['login'=>false]);
Route::get('admin/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('admin/login/post',[LoginController::class, 'login'])->name('login.post');
// authentication route end

// homcontroller route start
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('dashboard/index', [HomeController::class, 'dashboard_index'])->name('dashboard.index');
Route::post('file/name/store', [HomeController::class, 'file_name_store'])->name('file_name.store');
Route::post('file/delete/{file_id}', [HomeController::class, 'file_delete'])->name('file.delete');
// homcontroller route end

// portfolio route start
Route::get('/', [PortfolioController::class, 'index'])->name('index');
Route::get('blog/details/{id}', [PortfolioController::class, 'blog_details'])->name('blog.details');

// portfolio route end

// profile route start
Route::resource('profile',ProfileController::class);
Route::post('change/password', [ProfileController::class, 'change_password'])->name('change_password');
Route::post('about/setting', [ProfileController::class, 'aboutSetting'])->name('about_setting');
// profile route start

// banner route start
Route::resource('banner',BannerController::class);
Route::get('banner/restore/{id}', [BannerController::class, 'bannerRestore'])->name('banner_restore');
Route::get('banner/force/delete/{id}', [BannerController::class, 'banner_forcedelete'])->name('force_delete');
// banner route end

// about_area route start
Route::resource('about_area',AboutAreaController::class);
Route::get('about/restore/{id}', [AboutAreaController::class, 'aboutRestore'])->name('about_restore');
Route::get('about/force/delete/{id}', [AboutAreaController::class, 'about_forcedelete'])->name('about_force_delete');
// about_area route end

// award route start
Route::resource('award',AwardController::class);
Route::post('icon/update/{award_icon_id}', [AwardController::class, 'awardiconUpdate'])->name('award.icon.update');
Route::get('award/restore/{award_restore_id}', [AwardController::class, 'award_restore'])->name('award_restore');
Route::get('force/delete/{award_forcedelete_id}', [AwardController::class, 'forceDelete'])->name('force_delete');
// award route end

// education route start
Route::resource('educations',EducationsController::class);
Route::post('education/icon/update/{education_icon_id}', [EducationsController::class, 'education_iconUpdate'])->name('education_icon.update');
Route::get('education/restore/{education_restore_id}', [EducationsController::class, 'education_restore'])->name('education_restore');
Route::get('education/force/delete/{education_forcedelete_id}', [EducationsController::class, 'forceDelete'])->name('force_delete');
// education route end

// experience route start
Route::resource('experience',ExperienceController::class);
Route::get('experience/restore/{experience_restore_id}', [ExperienceController::class, 'experience_restore'])->name('experience_restore');
Route::get('experience/force/delete/{experience_forcedelete_id}', [ExperienceController::class, 'forceDelete'])->name('force_delete');
Route::post('experience/icon/update/{experience_icon_id}', [ExperienceController::class, 'experience_icon_update'])->name('experience_icon.update');
// experience route end

// skill route start
Route::resource('skills',SkillController::class);
Route::get('skill/restore/{skill_restore_id}', [SkillController::class, 'restore'])->name('restore');
Route::get('skill/force/delete/{skill_forcedelete_id}', [SkillController::class, 'force_delete'])->name('force.delete');
Route::post('skill/icon/update/{skill_icon_id}', [SkillController::class, 'skill_icon_update'])->name('icon.update');
// skill route end

// service route start
Route::resource('service',ServiceController::class);
Route::post('service/header/area/{service_head_id}', [ServiceController::class, 'service_header_area'])->name('service.header');
Route::get('service/restore/{service_restore_id}', [ServiceController::class, 'restore'])->name('service_restore');
Route::get('service/force/delete/{service_forcedelete_id}', [ServiceController::class, 'force_delete'])->name('force_delete');
// service route end

// counter route start
Route::resource('counter',CounterController::class);
Route::get('counter/restore/{counter_restore_id}', [CounterController::class, 'restore'])->name('counter_restore');
Route::get('counter/force/delete/{counter_forcedelete_id}', [CounterController::class, 'force_delete'])->name('force_delete');
Route::post('counter/bg_photo/{counter_photo_id}', [CounterController::class, 'counter_bg_photo'])->name('counter.bg_photo');
// counter route end

// category (portfolio) route start
Route::get('category/index', [CategoryController::class, 'category_index'])->name('category.index');
Route::post('category/insert', [CategoryController::class, 'category_insert'])->name('category.insert');
Route::get('category/edit/{category_edit_id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('category/update/{category_update_id}', [CategoryController::class, 'category_update'])->name('category.update');
Route::post('category/delete/{category_id}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::get('category/restore/{category_restore_id}', [CategoryController::class, 'restore'])->name('category_restore');
Route::get('category/force/delete/{category_forced_elete_id}', [CategoryController::class, 'force_delete'])->name('force.delete');
Route::post('portfolio/header/{portfolio_id}', [CategoryController::class, 'portfolio_header'])->name('portfolio.header');
// category (portfolio) route end

// subcategory (portfolio) route start
Route::resource('subcategory',SubcategoryController::class);
Route::get('sub/category/restore/{subcategory_restore_id}', [SubcategoryController::class, 'subcategory_restore'])->name('subcategory.restore');
Route::get('subcategory/force/delete/{subcategory_force_delete_id}', [SubcategoryController::class, 'subcategory_force_delete'])->name('force.delete');
// subcategory (portfolio) route end

// team route start
Route::resource('team',TeamController::class);
Route::get('team/restore/{team_restore_id}', [TeamController::class, 'restore'])->name('team_restore');
Route::get('team/force/delete/{team_forcedelete_id}', [TeamController::class, 'force_delete'])->name('force_delete');
Route::post('team/header/{team_header_id}', [TeamController::class, 'team_header'])->name('team.header');
// hire route start
Route::get('hire/area', [TeamController::class, 'hire_area'])->name('hire.area');
Route::post('hire/update/{hire_id}', [TeamController::class, 'hire_update'])->name('hire.update');
// hire route end

// team route end

// testimonial route start
Route::resource('testimonial',TestimonialController::class);
Route::get('testimonial/restore/{testimonial_restore_id}', [TestimonialController::class, 'restore'])->name('testimonial_restore');
Route::get('testimonial/force/delete/{testimonial_forcedelete_id}', [TestimonialController::class, 'force_delete'])->name('force_delete');
Route::post('testimonial/header/{testimonial_header_id}', [TestimonialController::class, 'testimonial_header'])->name('testimonial.header');
// testimonial route end

// Blog route start
Route::resource('blog',BlogController::class);
Route::post('blog/header/{blog_header_id}', [BlogController::class, 'blog_header'])->name('blog.header');
Route::get('blog/restore/{blog_restore_id}', [BlogController::class, 'blog_restore'])->name('blog.restore');
Route::get('blog/force/delete/{blog_force_delete_id}', [BlogController::class, 'blog_force_delete'])->name('force.delete');
// Blog route end

// contact route start
Route::resource('contact',ContactAreaController::class);
Route::post('contact/header/{contact_header_id}', [ContactAreaController::class, 'contact_header'])->name('contact.header');
Route::get('contact/restore/{contact_restore_id}', [ContactAreaController::class, 'restore'])->name('contact_restore');
Route::get('contact/force/delete/{contact_forcedelete_id}', [ContactAreaController::class, 'force_delete'])->name('force_delete');
// contact route end

// footer_icon route start
Route::resource('footer_icon',FooterIconController::class);
Route::get('footericon/restore/{footer_restore_id}', [FooterIconController::class, 'footericon_restore'])->name('footericon_restore');
Route::get('footericon/force/delete/{footer_forcedelete_id}', [FooterIconController::class, 'footericon_force_delete'])->name('footericon_force_delete');
// footer_icon route start
