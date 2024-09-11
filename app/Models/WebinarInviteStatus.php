<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WebinarInvite;

class WebinarInviteStatus extends Model
{
    use HasFactory;

    protected $table = 'webinar_invite_statuses';

    protected $fillable = [
        'name',
        'color',
        'icon',
        'order',
        'is_active',
        'description',
    ];

    public function invites()
    {
        return $this->hasMany(WebinarInvite::class, 'status_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
