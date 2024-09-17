<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\projectController;
use App\Http\Controllers\Admin\TypeController;
use App\Models\Project;
use App\Models\Type;


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

Route::get('/', function () {
    $projects = Project::all();

    $data = [
        'projects' => $projects
    ];
    return view('welcome', $data);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/mailable', function () {
    //$lead = ['name' => 'Fabio', 'email' => 'fabio@example.com', 'message' => 'lorem ipsum dolor', 'date' => '23/07/2024'];
    $lead = App\Models\Lead::first();

    //dd($lead);
    return new App\Mail\NewContact($lead);
});

Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/projects', projectController::class);
        Route::resource('/types', TypeController::class);
        Route::resource('/languages', LanguageController::class);
    });

require __DIR__ . '/auth.php';
