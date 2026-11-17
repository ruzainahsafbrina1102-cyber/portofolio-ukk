<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\Message;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'profile'      => Profile::first(),
            'skills'       => Skill::all(),
            'projects'     => Project::latest()->get(),
            'certificates' => Certificate::latest()->get(),
            'experiences'  => Experience::latest()->get(),
            'testimonials' => Testimonial::latest()->get(),
            'articles'     => Article::latest()->get(),
        ]);
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'sender_name'  => 'required|max:100',
            'sender_email' => 'required|email',
            'message'      => 'required',
        ]);

        Message::create($request->only(['sender_name', 'sender_email', 'message']));

        return back()->with('success', 'Terima kasih, kesan dan pesan Anda telah terkirim.');
    }
}