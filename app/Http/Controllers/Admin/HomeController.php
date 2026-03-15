<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'ongoing_projects' => DB::table('ongoing_project')->count(),
            'archived_projects' => DB::table('projects')->count(),
            'programs' => DB::table('programs')->count(),
            'news' => DB::table('latest_news')->count(),
            'gallery' => DB::table('gallery')->count(),
            'team_members' => DB::table('team_members')->count(),
            'donations' => DB::table('donations')->count(),
            'subscribers' => DB::table('subscribe')->count(),
            'messages' => DB::table('messages')->count(),
            'stories' => DB::table('stories')->count(),
            'volunteers' => DB::table('volunteers')->count(),
            'partners' => DB::table('partners')->count(),
            'publications' => DB::table('publications')->count(),
            'committee' => DB::table('executive_committee')->count(),
        ];

        $totalDonations = DB::table('donations')->sum('amount') ?? 0;

        $recentDonations = DB::table('donations')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $recentMessages = DB::table('messages')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $recentSubscribers = DB::table('subscribe')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('admin.home', compact('stats', 'totalDonations', 'recentDonations', 'recentMessages', 'recentSubscribers'));
    }
}
