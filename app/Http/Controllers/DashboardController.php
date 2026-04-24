<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 1. Error: Se usa contrabarra (\) para namespaces, no barra (/)
use App\Models\Ticket;
use App\Models\User;
use App\Models\Category;
use App\Models\Priority; // 2. Error: PHP es sensible a mayúsculas, debe coincidir con el nombre del archivo/clase
use App\Models\Status;   // 3. Error: Igual aquí, Status con S mayúscula

class DashboardController extends Controller
{
    public function index()
    {
        // 4. Asegúrate que las clases coincidan (Priority y Status en mayúsculas)
        $totalTickets = Ticket::count();
        $totalUsers = User::count();
        $totalCategory = Category::count();
        $totalpriority = Priority::count();
        $totalstatus = Status::count();

        $latestTickets = Ticket::with(['user', 'category', 'priority', 'status'])
            ->latest('id')
            ->take(5)
            ->get();

        // 5. Error: Faltaban comas entre los strings de compact() 
        // 6. Error: Había un espacio en 'totalUsers ' que causaría error al buscar la variable
        return view('dashboard', compact(
            'totalTickets',
            'totalUsers',
            'totalCategory',
            'totalpriority',
            'totalstatus',
            'latestTickets' // 7. Importante: ¡Olvidaste pasar la variable de los últimos tickets a la vista!
        ));
    }
}