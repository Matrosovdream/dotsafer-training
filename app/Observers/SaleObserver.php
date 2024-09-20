<?php

namespace App\Observers;

use Illuminate\Http\Request;

class SaleObserver
{
    
    public function created( $model )
    {

        // Just if the organization buys the webinar
        if( $model->buyer->role_id !== 3 ) { return $model; }

        if( session()->get('action') == 'buy_credits' ) {

            $orderTotal = session()->get('order_total');
            $orderCount = session()->get('order_count');

            // Flush the session values
            session()->forget('order_total');
            session()->forget('order_count');
            session()->forget('action');

            // Update sale price
            $model->total_amount = $orderTotal;
            $model->save();

            $credits = $orderCount;
            $type = 'add';


        } else {
            $credits = $model->amount / $model->webinar->price;
            $type = 'purchase';
        }

        if ($model->buyer->credit()->where('webinar_id', $model->webinar_id)->where('user_id', $model->buyer_id)->exists()) {
            $model->buyer->credit()->where('webinar_id', $model->webinar_id)->where('user_id', $model->buyer_id)->increment('amount', $credits);
        } else {
            $model->buyer->credit()->create([
                'webinar_id' => $model->webinar_id,
                'user_id' => $model->buyer_id,
                'amount' => $credits,
            ]);
        }

        // Add credits to Webinar History
        $model->webinar->creditHistory()->create([
            'user_id' => $model->buyer_id,
            'amount' => $credits,
            'action' =>  $type,
        ]);
        
        //dd($model);

    }

}
