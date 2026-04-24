<?php



use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

//Agregando rutas de proyecto



use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\DashboardController;



//ruta principal



Route::get('/', function(){

    return redirect('/dashboard');

}

);



//ruta para el inicio de seccion



Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'show'])
      ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
      ->name('login.post');
});

Route::middleware('auth')->group(function(){

    Route::post('/logout', [LoginController::class, 'logout'])
      ->name('logout');

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard'); 
});




Route::get('/dashboard',[DashboardController::class, 'index'])

->name('dashboard');

//ruta de text de base de datos





Route::get('/text-db', function () {

    try {

        DB::connection()->getPdo();

        $database = DB::connection()->getDatabaseName();

        $version = DB::select('SELECT VERSION() AS version')[0]->version;



        return view("text-db", [

            "status"   => true,

            "database" => $database,

            "version"  => $version,

            "message"  => "Conexión exitosa a la base de datos"

        ]);



    } catch (\Exception $e) { // Se agrega la \ antes de Exception

        return view("text-db", [

            "status"   => false,

            "database" => null,

            "version"  => null,

            "message"  => $e->getMessage()

        ]);

    }

});