<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebinarInvite;
use App\Models\Webinar;
use App\User;

class WebinarOrgManageController extends Controller
{
    
    public function index( $webinar_id )
    {

        $this->authorize("panel_webinars_lists");

        $webinar = Webinar::find($webinar_id);

        $invites = WebinarInvite::where('webinar_id', $webinar_id)
                    ->where('org_id', auth()->user()->id)
                    ->get();          

        $data = [
            'title' => 'Webinar Manager',
            'icon' => 'fa fa-video-camera',
            'breadcrumb' => [
                'panel.webinar.index' => 'Webinar Manager'
            ],
            'webinar' => $webinar,
            'studentsCount' => 0,
            'invites' => $invites,
            'creditsTotal' => 1,
            'creditsUsed' => 0,
            'creditsRemaining' => 0,
        ];

        return view(getTemplate() . '.panel.webinar.orgmanager.index', $data);
    }

    public function invite( $webinar_id )
    {
        $this->authorize("panel_webinars_lists");

        $data = [
            'title' => 'Webinar Manager',
            'icon' => 'fa fa-video-camera',
            'breadcrumb' => [
                'panel.webinar.index' => 'Webinar Manager'
            ],
            'webinar' => Webinar::find($webinar_id),
            'students' => [],
            'creditsTotal' => 1,
            'creditsUsed' => 0,
            'creditsRemaining' => 0,
        ];

        return view(getTemplate() . '.panel.webinar.orgmanager.invite', $data);
    }

    public function inviteStore( Request $request, $webinar_id )
    {
        $this->authorize("panel_webinars_lists");

        //dd($request->all());

        $invite = WebinarInvite::create([
            'webinar_id' => $webinar_id,
            'email' => $request->email,
            'org_id' => auth()->user()->id,
            'status_id' => 1,
            'credits' => 1,
        ]);

        $student = User::where('email', $request->email)->first();
        if( $student ) {
            $invite->student_id = $student->id;
            $invite->save();
        }
        

        return redirect()->route('panel.webinar.manage.invite', $webinar_id);
    }

    public function certificates( $webinar_id )
    {
        $this->authorize("panel_webinars_lists");

        $certificates =  [];
        $data = [
            'title' => 'Webinar Manager',
            'icon' => 'fa fa-video-camera',
            'breadcrumb' => [
                'panel.webinar.index' => 'Webinar Manager'
            ],
            'webinar' => Webinar::find($webinar_id),
            'certificates' => $certificates,
            'students' => [],
            'creditsTotal' => 1,
            'creditsUsed' => 0,
            'creditsRemaining' => 0,
        ];

        return view(getTemplate() . '.panel.webinar.orgmanager.certificates', $data);
    }

}
