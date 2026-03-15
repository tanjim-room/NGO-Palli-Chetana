<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontController extends Controller
{
    // about us
    public function about_us(){
        $about_us = DB::table('about_us')->first();
        return view('frontend.about_us',compact('about_us'));
    }

    // Subscribe
    public function subscribe(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:subscribe|max:255',
        ]);

        $subscribe = array([
            'name' => $request->name,
            'email' => $request->email
        ]);

        DB::table('subscribe')->insert($subscribe);
        return redirect()->back()->with('success','Thanks for Subscribed us!!!!');
    }

    // vision and mission
    public function vision_mission(){
        $mission_vision = DB::table('mission_vision')->first();
        return view('frontend.mission_vision',compact('mission_vision'));
    }

    // team members
    public function teamMembers(){
        $team = DB::table('team_members')->orderBy('order', 'asc')->get();
        return view('frontend.team_members', compact('team'));
    }

    // origin and legal affilation
    public function origin_affilation(){
        $affilation = DB::table('legal_affilation')->get();
        return view('frontend.origin_affilation',compact('affilation'));
    }

    // executive committee
    public function committee(){
        $committee = DB::table('executive_committee')->orderBy('order', 'asc')->get();
        return view('frontend.exe_committee', compact('committee'));
    }

    // Message form Cheif Executive
    public function cheif_msg(){
        $message = DB::table('chief_executive_message')->orderBy('id', 'desc')->first();
        return view('frontend.cheif_message', compact('message'));
    }

    // Partner and Donor
    public function partner(){
        $partners = DB::table('partners')->get();
        return view('frontend.partner',compact('partners'));
    }

    // impact
    public function impact(){
        $impact = DB::table('impact')->orderBy('order', 'asc')->get();
        return view('frontend.impact', compact('impact'));
    }

    // Key Focus Area
    public function key_focus(){
        $focus_areas = collect();

        try {
            $focus_areas = DB::table('focus_areas')
                ->where('is_active', 1)
                ->orderBy('order', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        } catch (\Throwable $e) {
            // If migration isn't run yet, fall back to defaults.
        }

        if ($focus_areas->isEmpty()) {
            $focus_areas = collect([
                (object)[
                    'id' => 1,
                    'title' => 'Women Empowerment',
                    'description' => 'Palli Chetana mainly focuses on women empowerment, eradicating gender-based violence at community, sub-district, district, and national levels. Palli Chetana undertakes initiatives that empower the destitute and neglected women who are deprived of their rights and works to ensure equal rights and opportunities for them. Palli Chetana works to accelerate women\'s dignity and equal opportunity. Palli Chetana sensitizes government and non-government institutions to strengthen the socio-economic status of women through training and advocacy. It also engages stakeholders including policymakers, local government representatives, media, communities, and religious leaders on GBV. Palli Chetana provides income generation training to support women\'s socio-economic empowerment.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/power.png',
                ],
                (object)[
                    'id' => 2,
                    'title' => 'Community Empowerment',
                    'description' => 'Palli Chetana believes community empowerment is only possible when everyone\'s voices are heard. Women\'s voices, particularly those living in poverty, are often unheard. Women often have the least power in communities and may not know their rights or how to realize them, meaning the potential of half the population is left unrealized. As a result, Palli Chetana provides people, especially women living in poverty, with the tools to claim entitlements, develop leadership, and take collective action through community-level organizations. In parallel, it works with local governments to be more accountable and responsive, creates violence-free enabling environments for women, and increases access to information and services. Palli Chetana strengthens women-led community-based organizations to uphold voices and realize rights while promoting prevention and response to violence against women and children.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/women.png',
                ],
                (object)[
                    'id' => 3,
                    'title' => 'Livelihood',
                    'description' => 'Palli Chetana plays an influential role in the development sector by supporting sustainable livelihoods and social change. Palli Chetana works to improve the livelihoods, income, and food security of extremely poor women, children, and men living in northern Bangladesh, particularly in char areas. Palli Chetana provides technical skills training, grants, and interest-free support to help people procure viable market assets or start businesses. It promotes agricultural farming, disaster preparedness, livelihood security, access to finance, and micro-enterprise as means of income, while also supporting market linkage.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/livelihood.png',
                ],
                (object)[
                    'id' => 4,
                    'title' => 'Social Protection',
                    'description' => 'Ensure access to health, education and employment opportunities, through community mobilization and linkages with government services, social safety net programs and emergency relief during crises.',
                    'icon_class' => null,
                    'icon_path' => null,
                    'image_path' => null,
                    'default_image' => 'img/key_area/social.png',
                ],
            ]);
        }

        return view('frontend.key_focus', compact('focus_areas'));
    }

    // Key Focus Area Detail
    public function key_focus_view($id){
        $focus_area = null;

        try {
            $focus_area = DB::table('focus_areas')->where('id', $id)->where('is_active', 1)->first();
        } catch (\Throwable $e) {}

        // Fallback to defaults if not found in DB
        if (!$focus_area) {
            $defaults = collect([
                (object)[
                    'id' => 1,
                    'title' => 'Women Empowerment',
                    'description' => 'Palli Chetana mainly focuses on women empowerment, eradicating gender-based violence at community, sub-district, district, and national levels. Palli Chetana undertakes initiatives that empower deprived and neglected women and works to ensure equal rights and opportunities for them.',
                    'icon_class' => null, 'icon_path' => null, 'image_path' => null, 'default_image' => 'img/key_area/power.png',
                ],
                (object)[
                    'id' => 2,
                    'title' => 'Community Empowerment',
                    'description' => 'Palli Chetana believes community empowerment is only possible when everyone\'s voices are heard. It provides people, especially women living in poverty, with the tools to claim entitlements, develop leadership, and take collective action through community-level organizations.',
                    'icon_class' => null, 'icon_path' => null, 'image_path' => null, 'default_image' => 'img/key_area/women.png',
                ],
                (object)[
                    'id' => 3,
                    'title' => 'Livelihood',
                    'description' => 'Palli Chetana plays an influential role in the development sector by promoting sustainable livelihoods and social change through agricultural farming, disaster preparedness, livelihood security, access to finance, and micro-enterprise support.',
                    'icon_class' => null, 'icon_path' => null, 'image_path' => null, 'default_image' => 'img/key_area/livelihood.png',
                ],
                (object)[
                    'id' => 4,
                    'title' => 'Social Protection',
                    'description' => 'Ensure access to health, education and employment opportunities, through community mobilization and linkages with government services, social safety net programs and emergency relief during crises.',
                    'icon_class' => null, 'icon_path' => null, 'image_path' => null, 'default_image' => 'img/key_area/social.png',
                ],
            ]);
            $focus_area = $defaults->firstWhere('id', (int)$id);
        }

        if (!$focus_area) {
            abort(404);
        }

        return view('frontend.key_focus_view', compact('focus_area'));
    }

    // Project Archieve
    public function proj_archieve(){
        $project = DB::table('projects')->get();
        return view('frontend.project_archieve',compact('project'));
    }

    // Project Archive Detail
    public function proj_archive_view($id){
        $project = DB::table('projects')->where('id', $id)->first();
        if (!$project) {
            abort(404);
        }
        return view('frontend.project_archive_view', compact('project'));
    }

    // Ongoing Project
    public function ongoing_project(){
        $project = DB::table('ongoing_project')->paginate(15);
        return view('frontend.ongoing_project',compact('project'));
    }

    //__ongoing Project view__//
    public function project_view($id){
        $project = DB::table('ongoing_project')->where('id',$id)->first();
        return view('frontend.project_view',compact('project'));
    }

    //__Latest News All__//
    public function news_all(){
        $news = DB::table('latest_news')->paginate(15);
        return view('frontend.news_all',compact('news'));
    }

    // Youtube
    public function youtube(){
        return view('frontend.youtube');
    }

    // Programs
    public function programs(){
        $programs = DB::table('programs')->orderBy('id', 'desc')->get();
        return view('frontend.programs', compact('programs'));
    }

    // Program View
    public function programsView($id){
        $program = DB::table('programs')->where('id', $id)->first();
        return view('frontend.featured_prog_view', compact('program'));
    }

    // Stories
    public function stories(){
        $stories = DB::table('stories')->orderBy('id', 'desc')->get();
        return view('frontend.stories', compact('stories'));
    }

    // Story View
    public function storiesView($id){
        $story = DB::table('stories')->where('id', $id)->first();
        return view('frontend.story_view', compact('story'));
    }

    //__Latest News view__//
    public function news_view($id){
        $news = DB::table('latest_news')->where('id',$id)->first();
        return view('frontend.news_view',compact('news'));
    }

    // Events Calender
    public function calender(){
        return view('frontend.calender');
    }

    // Strategic Plan
    public function strategic_plan(){
        $strategicPlans = DB::table('strategic_plans')->orderBy('created_at', 'desc')->get();
        return view('frontend.strategic_plan', compact('strategicPlans'));
    }

    // Policy Guideline
    public function policy_guideline(){
        $policy = DB::table('policy_guideline')->get();
        return view('frontend.policy_guideline',compact('policy'));
    }

    // Publication
    public function publication(){
        $publications = DB::table('publications')->orderBy('created_at', 'desc')->get();
        return view('frontend.publication', compact('publications'));
    }

    // Get Involved
    public function career(){
        $career = DB::table('invoked')->get();
        return view('frontend.career',compact('career'));
    }

    // Volunteer Opportunities
    public function volOpportunities(){
        $volunteers = DB::table('volunteers')->where('status', 'open')->orderBy('id', 'desc')->get();
        return view('frontend.volunteer_opportunities', compact('volunteers'));
    }

    // Donate
    public function donate(){
        $paymentMethods = \App\Models\PaymentMethod::active()->get();
        return view('frontend.donate', compact('paymentMethods'));
    }

    // Donation Submit
    public function donationSubmit(Request $request){
        $validatedData = $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_phone' => 'required|string|max:20',
            'transaction_id' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]);

        \App\Models\Donation::create([
            'donor_name' => $request->donor_name,
            'donor_phone' => $request->donor_phone,
            'transaction_id' => $request->transaction_id,
            'amount' => $request->amount,
            'payment_method_id' => $request->payment_method_id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Thank you for your donation! We will verify it soon.');
    }

    // Fundraising
    public function fundraising(){
        $campaigns = DB::table('fundraising_campaigns')->orderBy('created_at', 'desc')->get();
        return view('frontend.fundraising', compact('campaigns'));
    }

    // Corporate Partnership
    public function corporate(){
        return view('frontend.corporate_partner');
    }

    // Get Contact
    public function contact(){
        $head_office = DB::table('contacts')->where('type', 'head_office')->where('status', 'active')->first();
        $branches = DB::table('contacts')->where('type', 'branch')->where('status', 'active')->get();
        $persons = DB::table('contacts')->where('type', 'person')->where('status', 'active')->get();
        return view('frontend.contact', compact('head_office', 'branches', 'persons'));
    }

    // Message Store
    public function messageStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = array([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        DB::table('messages')->insert($message);
        return redirect()->back()->with('success','Successfully Submitted Your Message.');
    }

    //__All Photos
    public function all_photos(){
        $photos = DB::table('gallery')->paginate('30');
        return view('frontend.photos_all',compact('photos'));
    }

    // FAQ
    public function faq(){
        $faqs = DB::table('faq')->orderBy('order', 'asc')->get();
        return view('frontend.faq', compact('faqs'));
    }
}
