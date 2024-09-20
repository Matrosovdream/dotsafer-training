<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebinarInvite;
use App\Models\Webinar;
use App\User;
use App\Models\Cart;
use App\Http\Controllers\Web\CartController;

class WebinarOrgManageController extends Controller
{

    protected $webinar_id = '';
    
    public function index( $webinar_id )
    {

        $this->authorize("panel_webinars_lists");

        $webinar = Webinar::find($webinar_id);
        $this->webinar_id = $webinar_id;

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
            'creditsTotal' => $this->creditStat()['totalPurchased'],
            'creditsUsed' => $this->creditStat()['used'],
            'creditsRemaining' => $this->creditStat()['remaining'],
        ];

        return view(getTemplate() . '.panel.webinar.orgmanager.index', $data);
    }

    public function invite( $webinar_id )
    {
        $this->authorize("panel_webinars_lists");

        $webinar = Webinar::find($webinar_id);
        $this->webinar_id = $webinar_id;

        $data = [
            'title' => 'Webinar Manager',
            'icon' => 'fa fa-video-camera',
            'breadcrumb' => [
                'panel.webinar.index' => 'Webinar Manager'
            ],
            'webinar' => Webinar::find($webinar_id),
            'students' => [],
            'creditsTotal' => $this->creditStat()['totalPurchased'],
            'creditsUsed' => $this->creditStat()['used'],
            'creditsRemaining' => $this->creditStat()['remaining'],
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

        $webinar = Webinar::find($webinar_id);
        $this->webinar_id = $webinar_id;

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
            'creditsTotal' => $this->creditStat()['totalPurchased'],
            'creditsUsed' => $this->creditStat()['used'],
            'creditsRemaining' => $this->creditStat()['remaining'],
        ];

        return view(getTemplate() . '.panel.webinar.orgmanager.certificates', $data);
    }

    public function purchasecredits( $webinar_id ) {

        $this->authorize("panel_webinars_lists");

        $webinar = Webinar::find($webinar_id);
        $this->webinar_id = $webinar_id;

        $data = [
            'title' => 'Webinar Manager',
            'icon' => 'fa fa-video-camera',
            'breadcrumb' => [
                'panel.webinar.index' => 'Webinar Manager'
            ],
            'webinar' => Webinar::find($webinar_id),
            'students' => [],
            'creditsTotal' => $this->creditStat()['totalPurchased'],
            'creditsUsed' => $this->creditStat()['used'],
            'creditsRemaining' => $this->creditStat()['remaining'],
        ];

        return view(getTemplate() . '.panel.webinar.orgmanager.purchasecredits', $data);

    }

    public function purchasecreditsGateway( Request $request, $webinar_id ) {

        $user = auth()->user();

        if (!empty($user) and !empty(getFeaturesSettings('direct_classes_payment_button_status'))) {

            $fakeCarts = collect();

            $fakeCart = new Cart();
            $fakeCart->creator_id = $user->id;
            $fakeCart->webinar_id = $webinar_id;
            $fakeCart->ticket_id = null;
            $fakeCart->special_offer_id = null;
            $fakeCart->created_at = time();

            $fakeCarts->add($fakeCart);

            $cartController = new CartController();

            // Webinar price
            $total = Webinar::find($webinar_id)->price * $request->count;

            // Add total to flash session
            session()->put('order_total', $total);
            session()->put('order_count', $request->count);
            session()->put('action', 'buy_credits');

            return $cartController->checkout(new Request(), $fakeCarts, $total);

        }

    }

    public function creditStat() {

        $webinar_id = $this->webinar_id;

        $webinar = Webinar::find($webinar_id);

        // Total purchased credits
        $totalPurchased = $webinar->creditHistory()
            ->where('action', 'purchase')
            ->orWhere('action', 'add')
            ->where ('user_id', auth()->user()->id)
            ->sum('amount');

        // Total used credits
        $used = $webinar->creditHistory()
            ->where('action', 'deduct')
            ->where ('user_id', auth()->user()->id)
            ->sum('amount');    

        // Total remaining credits
        $remaining = $totalPurchased - $used;

        return [
            'totalPurchased' => $totalPurchased,
            'used' => $used,
            'remaining' => $remaining,
        ];    

    }

}
