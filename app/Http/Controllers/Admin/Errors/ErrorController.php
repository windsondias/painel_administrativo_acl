<?php

namespace App\Http\Controllers\Admin\Errors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function error403()
    {
        return view('admin.errors.403');
    }
}
