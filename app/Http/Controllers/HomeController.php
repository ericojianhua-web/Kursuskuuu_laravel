<?php


namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu Erik Ajaya';

        $featured = [
            [
                'code' => 'WEB-01',
                'name' => 'HTML dan CSS',
                'description' => 'Belajar membuat struktur dan tampilan website.'
            ],
            [
                'code' => 'PHP-01',
                'name' => 'PHP Dasar',
                'description' => 'Belajar variabel, function, form, dan logika PHP.'
            ],
            [
                'code' => 'LAR-01',
                'name' => 'Laravel Fundamental',
                'description' => 'Belajar route, controller, Blade, dan MVC.'
            ],
        ];

        return view('home', compact('siteName', 'featured'));
    }
}
