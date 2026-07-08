<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        return view('cashier.index');
    }

    public function getTables()
    {
        $tables = Table::all();
        $html = '';
        foreach ($tables as $table) {
            $html .= '<div class="col-md-2">';
            $html .= '<button class="btn btn-primary">';
            $html .= '<img class="img-fluid" src="' . url('/images/table.svg') . '"/>';
            $html .= '<br>';
            $html .= '<span class="badge badge-success">' . $table->name . '</span>';
            $html .= '</button>';
            $html .= '</div>';
        }
        return $html;
    }
}
