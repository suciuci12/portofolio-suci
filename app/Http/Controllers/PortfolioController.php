<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
 public function index(){
     $name = 'Suci Indah Sari';
        $role = 'Junior Web Developer';
        $about = 'Saya seorang developer pemula yang suka belajar Laravel, PHP, dan front-end. Suka ngulik project kecil-kecil untuk nambah skill.';

        $skills = [
            'Laravel 11',
            'PHP 8',
            'MySQL',
            'HTML, CSS',
            'Git & GitHub',
        ];

        $projects = [
            [
                'title' => 'Dashboard Inventory',
                'description' => 'Aplikasi CRUD sederhana untuk mengelola stok barang.',
                'link' => '#',
            ],
            [
                'title' => 'Landing Page Portofolio',
                'description' => 'Halaman portofolio pribadi dengan Laravel dan Blade.',
                'link' => '#',
            ],
        ];

        return view('portofolio', compact('name', 'role', 'about', 'skills', 'projects'));
 }
}
