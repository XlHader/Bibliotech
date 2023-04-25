<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategorieCollection;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        return new CategorieCollection(Categorie::all());
    }
}