<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Services (Floor Plans, Visualisations, Lease Plans, Planning)
Route::get('/services', [FloorPlanController::class, 'index'])->name('services.index');
Route::get('/floor-plans', [FloorPlanController::class, 'index'])->name('floor-plans.index');
Route::get('/floor-plans/{slug}', [FloorPlanController::class, 'show'])->name('floor-plans.show');

// Projects (Concepts & Design Studies)
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Photo Gallery Archive
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Contact & Inquiries
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (Simplified /login URL)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login')->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::redirect('/studio-cms-portal/login', '/login');

/*
|--------------------------------------------------------------------------
| Protected Secret Admin Portal & CMS Routes
|--------------------------------------------------------------------------
*/
Route::prefix('studio-cms-portal')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // CMS Site Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');

    // Dynamic Category CMS Manager
    Route::get('/categories', [CategoryController::class, 'adminIndex'])->name('admin.categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::post('/categories/{id}/edit', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::post('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Photo Gallery CMS
    Route::get('/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');
    Route::post('/gallery', [AdminController::class, 'storeGallery'])->name('admin.gallery.store');
    Route::post('/gallery/{id}/update', [AdminController::class, 'updateGallery'])->name('admin.gallery.update');
    Route::post('/gallery/{id}/delete', [AdminController::class, 'destroyGallery'])->name('admin.gallery.destroy');

    // Projects CRUD
    Route::get('/projects', [AdminController::class, 'projects'])->name('admin.projects');
    Route::get('/projects/create', [AdminController::class, 'createProject'])->name('admin.projects.create');
    Route::post('/projects/create', [AdminController::class, 'storeProject'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [AdminController::class, 'editProject'])->name('admin.projects.edit');
    Route::post('/projects/{id}/edit', [AdminController::class, 'updateProject'])->name('admin.projects.update');
    Route::post('/projects/{id}/delete', [AdminController::class, 'destroyProject'])->name('admin.projects.destroy');

    // Services CRUD
    Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
    Route::get('/services/create', [AdminController::class, 'createService'])->name('admin.services.create');
    Route::post('/services/create', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::get('/services/{id}/edit', [AdminController::class, 'editService'])->name('admin.services.edit');
    Route::post('/services/{id}/edit', [AdminController::class, 'updateService'])->name('admin.services.update');
    Route::post('/services/{id}/delete', [AdminController::class, 'destroyService'])->name('admin.services.destroy');

    // Inquiries Management
    Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('admin.inquiries');
    Route::post('/inquiries/{id}/status', [AdminController::class, 'updateInquiryStatus'])->name('admin.inquiries.status');
    Route::post('/inquiries/{id}/update', [AdminController::class, 'updateInquiry'])->name('admin.inquiries.update');
    Route::post('/inquiries/{id}/delete', [AdminController::class, 'destroyInquiry'])->name('admin.inquiries.destroy');
});
