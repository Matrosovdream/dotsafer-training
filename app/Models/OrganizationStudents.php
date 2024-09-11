<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class OrganizationStudents extends Model
{
    use HasFactory;

    protected $table = 'organization_students';

    protected $fillable = [
        'organization_id',
        'student_id',
        'confirmed'
    ];

    public function organization()
    {
        return $this->belongsTo(User::class, 'organization_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function confirm()
    {
        $this->confirmed = 1;
        $this->save();
    }

    public function reject()
    {
        $this->confirmed = 0;
        $this->save();
    }

    public function isConfirmed()
    {
        return $this->confirmed == 1;
    }

}
