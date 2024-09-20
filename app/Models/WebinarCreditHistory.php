<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Webinar;


class WebinarCreditHistory extends Model
{
    protected $table = 'webinar_credits_history';
    protected $fillable = [
        'webinar_id',
        'action',
        'user_id',
        'user_id_to',
        'amount',
    ];

    public function credit()
    {
        return $this->belongsTo(WebinarCredit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'user_id_to');
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

}
