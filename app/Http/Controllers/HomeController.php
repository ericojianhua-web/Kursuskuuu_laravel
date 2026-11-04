<?php
namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu Erik Ajaya';

        $featured = Course::latest()->get();

        return view('home', compact('siteName', 'featured'));
    }
}