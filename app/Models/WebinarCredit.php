<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Webinar;
use App\Models\WebinarCreditHistory;

class WebinarCredit extends Model
{
    protected $fillable = [
        'user_id',
        'webinar_id',
        'user_id',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

    public function history()
    {
        return $this->hasMany(WebinarCreditHistory::class);
    }

    


}
