<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
