<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CashbackRuleSpecificationItem extends Model
{
    protected $table = 'cashback_rule_specification_items';
    public $timestamps = false;
    protected $guarded = ['id'];


}
