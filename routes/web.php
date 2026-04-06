<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Console\View\Components\Success;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\ContactController;
use App\Models\User;
use App\Http\Controllers\Admin\SessionController;

/*|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be assigned to the "web"
| middleware group. Make something great!
|*/

// Public Authentication Routes
Route::get('/register', [SignupController::class, 'index']);
Route::get('/login', [SigninController::class, 'index']);


Route::get('/admin/activity', [SessionController::class, 'index'])->name('admin.activity');

/*
|--------------------------------------------------------------------------
| The Routing Hub (Entry Point)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->user()->role === 'superadmin') {
        return redirect()->route('admin.dashboard');
    }
    
    // Redirect standard users to the actual /home URL
    return redirect()->route('home');
})->middleware(['auth'])->name('index'); // Changed name to 'index' to prevent collision




/* users page */
Route::get('/admin/users', function () {
    if (auth()->user()->role === 'superadmin') {
        $users = User::all();
        return view('admin.view.users', compact('users'));
    }
    abort(403, 'User not an admin, access denied.');
})->middleware(['auth'])->name('admin.users');



/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Standard User Routes (Protected by role.user)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'role.user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/training',[TrainingController::class, 'index'])->name('training');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
});


/*
|--------------------------------------------------------------------------
| Utility / Testing Routes
|--------------------------------------------------------------------------
*/
Route::get('/test-email', function () {
    try {
        \Mail::raw('Test email from WALTECH ICT - ' . now() . '. Check your Gmail inbox and spam folder!', function($message) {
            $message->from('noreply@waltech-ict.com', 'WALTECH ICT')
                    ->to('mosesdimkpa1@gmail.com')
                    ->subject('WALTECH ICT Verification Test - ' . date('H:i:s'));
        });
        return '✅ Email sent! Check your Gmail inbox AND spam/junk folder. It may take 2-3 minutes.';
    } catch (\Exception $e) {
        return '❌ Error: ' . $e->getMessage();
    }
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';