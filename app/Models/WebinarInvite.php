<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Models\Webinar;
use App\User;
use App\Models\WebinarInviteStatus;


class WebinarInvite extends Model
{
    use HasFactory;

    protected $table = 'webinar_invites';

    protected $fillable = [
        'webinar_id',
        'student_id',
        'email',
        'org_id',
        'status_id',
        'credits',
    ];

    public function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function organization()
    {
        return $this->belongsTo(User::class, 'org_id');
    }

    public function status()
    {
        return $this->belongsTo(WebinarInviteStatus::class, 'status_id');
    }

    public function scopePending($query)
    {
        return $query->where('status_id', 1);
    }

    public function scopeAccepted($query)
    {
        return $query->where('status_id', 2);
    }

    public function scopeRejected($query)
    {
        return $query->where('status_id', 3);
    }

    public function scopeCanceled($query)
    {
        return $query->where('status_id', 4);
    }

    // Send email to student
    public function sendEmail()
    {
        $webinar = $this->webinar;
        $student = $this->student;
        $org = $this->org;

        $data = [
            'webinar' => $webinar,
            'student' => $student,
        ];

        Mail::send('emails.webinar.invite', $data, function ($message) use ($student, $webinar) {
            $message->to($student->email, $student->name)
                ->subject('Invitation to Webinar: ' . $webinar->title);
        });
    }
    

}
