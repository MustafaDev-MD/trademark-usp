<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientApplication extends Model
{
    protected $table = 'client_applications';

    protected $fillable = [
        'first_name', 'last_name', 'owner_of_mark', 'dba', 'business_name',
        'business_nature', 'mailing_address', 'city', 'state', 'country',
        'zip_code', 'phone_number', 'website', 'email_address', 'trademark_type',
        'mark_details', 'business_description', 'using_logo', 'logo_file',
        'usage_list', 'date_of_use',
    ];
}