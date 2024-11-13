<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function __invoke()
    {
        $categories = NewsCategory::query()
            ->with(['creator', 'news', 'news.creator'])
            ->get()
            ->toArray();
        dd($categories);
    }
}
