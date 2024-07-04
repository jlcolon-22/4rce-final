<?php

use App\Livewire\Auth\Login;
use App\Livewire\Client\Faqs;
use App\Livewire\Client\About;
use App\Livewire\Admin\Setting;
use App\Livewire\Auth\Register;
use App\Livewire\Admin\Customer;
use App\Livewire\Client\Contact;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Auth\LoginAdmin;
use App\Livewire\Client\Estimate;
use App\Livewire\Client\Homepage;
use App\Livewire\Client\Projects;
use App\Livewire\Admin\Project\Team;
use App\Livewire\Client\ProjectView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Employee\Account;
use App\Livewire\Admin\Project\Division;
use App\Livewire\Admin\Project\Progress;
use Laravel\Socialite\Facades\Socialite;
use App\Livewire\Admin\Employee\Position;
use App\Livewire\Admin\Feedback;
use App\Livewire\Admin\Project\Inventory;
use App\Livewire\Admin\Project\ProjectList;
use App\Livewire\Employee\Dashboard as EmployeeDashboard;
use App\Livewire\ForgotPassword;
use App\Livewire\ResetPassword;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('employee/home',EmployeeDashboard::class)->name('employee.home')->middleware('employee.only');
Route::get('/employee/project/progress/{project_id}',\App\Livewire\Employee\ProjectProgress::class)->name('employee.project.progress')->middleware('employee.only');
Route::get('/employee/project/inventory/{id}',\App\Livewire\Employee\Inventory::class)->name('employee.project.inventory')->middleware('employee.only');
Route::get('/employee/logout', function () {
    Auth::guard('employee')->logout();
    return redirect()->route('client.login');
})->name('employee.logout')->middleware('employee.only');


Route::middleware('admin.only')->prefix('admin')->group(function () {
    // Routes within this group will have the 'admin' prefix
    Route::get('auth/login', LoginAdmin::class)->name('admin.login');
    Route::get('setting', Setting::class)->name('admin.setting');
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('customer', Customer::class)->name('admin.customer');
    Route::get('feedback', Feedback::class)->name('admin.feedback');
    Route::get('employee/position', Position::class)->name('admin.employee.position');
    Route::get('employee/account', Account::class)->name('admin.employee.account');

    Route::get('project/division', Division::class)->name('admin.project.division');
    Route::get('project/team', Team::class)->name('admin.project.team');
    Route::get('project/list', ProjectList::class)->name('admin.project.list');
    Route::get('project/progress/{project_id}', Progress::class)->name('admin.project.progress');
    Route::get('project/inventory/{project_id}', Inventory::class)->name('admin.project.inventory');

    Route::get('logout', function () {
        Auth::guard('web')->logout();
        return redirect()->route('client.login');
    })->name('admin.logout');
});

Route::get('/', Homepage::class)->name('client.homepage');
Route::get('/forgot-password', ForgotPassword::class)->name('client.forgot.password');
Route::get('/reset-password/{type}/{id}', ResetPassword::class)->name('client.reset.password');
Route::get('/projects', Projects::class)->name('client.project');
Route::get('/project/{id}', ProjectView::class)->name('client.project.view');
Route::get('/faqs', Faqs::class)->name('client.faqs');
Route::get('/about', About::class)->name('client.about');
Route::get('/contact', Contact::class)->name('client.contact');
Route::get('/login', Login::class)->name('client.login');
Route::get('/register', Register::class)->name('client.register');
Route::get('/estimate', Estimate::class)->name('client.estimate');
Route::get('logout', function () {
    Auth::guard('customer')->logout();
    return redirect()->route('client.login');
})->name('client.logout')->middleware('customer.only');
Route::get('/profile',\App\Livewire\Client\Profile::class)->name('client.profile')->middleware('customer.only');
Route::get('/feedback',\App\Livewire\Client\Feedback::class)->name('client.feedback')->middleware('customer.only');
Route::get('/MyProjects',\App\Livewire\Client\CustomerProject::class)->name('client.myprojects')->middleware('customer.only');
Route::get('/MyProjects/project/inventory/{id}',\App\Livewire\Client\ProjectInventory::class)->name('client.myprojects.project.inventory')->middleware('customer.only');
Route::get('/MyProjects/project/progress/{project_id}',\App\Livewire\Client\ProjectProgress::class)->name('client.myprojects.project.progress')->middleware('customer.only');
Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');
Route::get('/authorized/google/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    $finduser = \App\Models\Customer::query()->where('google_id', $user->id)->first();
    if ($finduser) {
        Auth::guard('customer')->login($finduser);
        return redirect()->route('client.homepage');
    }
    $check = \App\Models\Customer::query()->where('email', $user->email)->first();
    if ($check) {
        $check->update(['google_id' => $user->id]);
    } else {
        $check = \App\Models\Customer::query()->create([
            'fullname' => $user->name,
            'email' => $user->email,
            'google_id' => $user->id,
            'password' => Hash::make($user->email)
        ]);
    }


    Auth::guard('customer')->login($check);
    return redirect()->route('client.homepage');
})->name('google.callback');
