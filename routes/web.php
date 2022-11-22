<?php

namespace App\Models;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


$publications_txt = [
    [
        'title' => 'Sensacja! Riot usunął popularną postać Yumi z Lola',
        'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum culpa minus quae nulla voluptatum? Dignissimos, voluptate corporis itaque dolores quod minima repudiandae exercitationem commodi, dolorum aliquam quia rerum quam cumque',
        'author' => 'Riot company'
    ],
    [
        'title' => 'Izak kończy z karierą na Twichu',
        'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum culpa minus quae nulla voluptatum? Dignissimos, voluptate corporis itaque dolores quod minima repudiandae exercitationem commodi, dolorum aliquam quia rerum quam cumque',
        'author' => 'Twitch'
    ],
    [
        'title' => 'Bomba Atomowa leci na ukraine',
        'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum culpa minus quae nulla voluptatum? Dignissimos, voluptate corporis itaque dolores quod minima repudiandae exercitationem commodi, dolorum aliquam quia rerum quam cumque',
        'author' => 'Wladimi Putin',
    ],
    [
        'title' => 'Czadowe Fajerwerki !!!',
        'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum culpa minus quae nulla voluptatum? Dignissimos, voluptate corporis itaque dolores quod minima repudiandae exercitationem commodi, dolorum aliquam quia rerum quam cumque',
        'author' => 'Markus Duesmann',
    ],
    [
        'title' => 'Super Rak Prostaty',
        'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum culpa minus quae nulla voluptatum? Dignissimos, voluptate corporis itaque dolores quod minima repudiandae exercitationem commodi, dolorum aliquam quia rerum quam cumque',
        'author' => 'Michael Lenoure',
    ],
    [
        'title' => 'Nowy Artykuł o demencji ',
        'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum culpa minus quae nulla voluptatum? Dignissimos, voluptate corporis itaque dolores quod minima repudiandae exercitationem commodi, dolorum aliquam quia rerum quam cumque',
        'author' => 'Microsoft company',
    ],
    [
        'title' => 'Nowy Artykuł o demencji ',
        'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum culpa minus quae nulla voluptatum? Dignissimos, voluptate corporis itaque dolores quod minima repudiandae exercitationem commodi, dolorum aliquam quia rerum quam cumque',
        'author' => 'Microsoft company',
    ],
];

$publications = [];
for ($i=0; $i < count($publications_txt); $i++) { 
    $publication = new Publication($publications_txt[$i]);
    $p_publication = Publication::all();
    array_push($publications,$publication);
}

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('about-us', [SiteController::class, 'about'])->name('about-us');
Route::get('laravel-help', [SiteController::class, 'help'])->name('laravel-help');

Route::get('posts', [PublicationController::class, 'index'])->name('posts');
Route::get('post/{publication}', [PublicationController::class, 'show'])->name('post.view');

