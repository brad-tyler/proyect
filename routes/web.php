<?php

use App\Http\Controllers\Administrador\DocenteController;
use App\Http\Controllers\Administrador\EscuelaController;
use App\Http\Controllers\cursocontroller;
use App\Http\Controllers\Docente\VerTarea;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/datatable', function () {
    return Inertia::render('Datatable');
});

Route::get('/calendars', function () {
    return Inertia::render('Calendars');
});

Route::get('/formulario', function () {
    return Inertia::render('Formulario');
});

// Route::get('/registrarestudiante', function () {
//     return Inertia::render('RegistrarEstudiante');
// });

Route::get('/cursodocente', function () {
    return Inertia::render('AsignarCurso');
});

Route::get('/users', function () {
    return Inertia::render('Users');
})->name('users');

/*
Admin-2
*/
Route::get('/facultad', function () {
    return Inertia::render('Facultadd');
});
// Route::get('/facultadview', function () {
//     return Inertia::render('Facultadview');
// });
Route::get('/registrar-estudiante', function () {
    return Inertia::render('Estudiante');
});
Route::get('/estudianteview', function () {
    return Inertia::render('Estudianteview');
});

/**
 * DOCENTE
 */
// Route::get('/cursos-docente', function () {
//     return Inertia::render('DocenteCursos');
// });

Route::get('/docente', function () {
    return Inertia::render('Docente');
});

Route::get('/lista-tareas', function () {
    return Inertia::render('DocenteListaTareas');
});

Route::get('/docente-ver-tarea/{json}', [VerTarea::class, 'index'])->name('docente-ver-tarea');
Route::resource('docente-ver-tarea', VerTarea::class);

Route::get('/cursodocente', [DocenteController::class, 'index'])->name('verfacultades');

Route::get('/escuelas/{id}', [EscuelaController::class, 'show']);


/**
 * ESTUDIANTE
 */
Route::get('/tareas', function () {
    return Inertia::render('EstudianteTareas');
});
Route::get('/cursos', function () {
    return Inertia::render('EstudianteCursos');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // dd(Auth::user()->name);
        // return Inertia::render('Dashboard');

        $id = Auth::user()->id;
        $user = User::find($id);

        // dd($user->getRoleNames());

        return Inertia::render('Dashboard', [
            'user' => Auth::user(),
            'userRoles' => $user->getRoleNames(),
            'userPermissions' => $user->getAllPermissions()
        ]);
    })->name('dashboard');
});

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
    if ($userExists) {
        Auth::login($userExists);
    } else {
        $userNew = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);
        Auth::login($userNew);
    }
    // $user->token
    return redirect('/dashboard');
});

Route::get('auth/facebook', [SocialController::class, 'redirectFacebook']);
Route::get('auth/facebook/callback', [SocialController::class, 'callbackFacebook']);
