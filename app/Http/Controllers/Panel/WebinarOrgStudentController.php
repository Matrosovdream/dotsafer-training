<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebinarInvite;
use App\Models\Sale;
class WebinarOrgStudentController extends Controller
{

    public function invites()
    {
        
        $this->authorize("panel_webinars_lists");

        $invites = WebinarInvite::where('email', auth()->user()->email)->get();

        //dd($invites[0]->webinar->translation->title);

        $data = [
            'title' => 'Webinar Invites',
            'icon' => 'fa fa-video-camera',
            'breadcrumb' => [
                'panel.webinar.index' => 'Webinar Invites'
            ],
            'invites' => $invites,
        ];

        return view(getTemplate() . '.panel.webinar.orgstudent.invites', $data);
    }

    public function inviteSingle( $invite_id )
    {
        $this->authorize("panel_webinars_lists");

        $data = [
            'title' => 'Webinar Manager',
            'icon' => 'fa fa-video-camera',
            'breadcrumb' => [
                'panel.webinar.index' => 'Webinar Manager'
            ],
            'webinar' => [],
            'students' => [],
            'creditsTotal' => 1,
            'creditsUsed' => 0,
            'creditsRemaining' => 0,
        ];

        return view(getTemplate() . '.panel.webinar.orgmanager.invite.single', $data);
    }

    public function acceptInvite( $invite_id  )
    {
        $this->authorize("panel_webinars_lists");

        $invite = WebinarInvite::find($invite_id);
        $invite->status_id = 2;
        $invite->student_id = auth()->user()->id;
        $invite->save();

        // Take Sale of by the org_id and webinar_id
        $sale = Sale::where('buyer_id', $invite->org_id)
                    ->where('webinar_id', $invite->webinar_id)
                    ->first();

        // Make a copy and change the buyer_id to student_id
        $newSale = $sale->replicate();
        $newSale->buyer_id = $invite->student_id;
        $newSale->created_at = time();
        $newSale->save();

        // Add credits to Webinar History
        $invite->webinar->creditHistory()->create([
            'user_id' => $invite->org_id,
            'user_id_to' => $invite->student_id,
            'amount' => $invite->credits,
            'action' =>  'deduct',
        ]);

        // Deduct credits from the org
        $webinar = $invite->webinar;
        $webinar->credits()->decrement('amount', 1);
        

        return redirect()->route('panel.webinar.student.invites');
    }

    public function rejectInvite( $invite_id )
    {
        $this->authorize("panel_webinars_lists");

        $invite = WebinarInvite::find($invite_id);
        $invite->status_id = 3;
        $invite->student_id = auth()->user()->id;
        $invite->save();

        return redirect()->route('panel.webinar.student.invites');

    }

}
