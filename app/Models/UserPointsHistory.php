<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserPointsHistory extends Model
{
    use HasFactory;

    protected $table = 'users_points_history';

    protected $fillable = [
        'user_id',
        'amount',
        'action',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
