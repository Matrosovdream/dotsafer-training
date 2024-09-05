<?php

namespace App\Models\Translation;


use Illuminate\Database\Eloquent\Model;

class FormFieldTranslation extends Model
{

    protected $table = 'form_field_translations';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $guarded = ['id'];
}
