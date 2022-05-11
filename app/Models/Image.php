<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'FirstName',
        'MiddleName',
        'LastName',
        'Leave',
        'StartDate',
        'EndDate',
        'TotalNoOfDays',
        'ClientCode',
        'UploadEmail',
        'AdditionalLeave'
    ];
}
