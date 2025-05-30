<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(TenantUser::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public static function boot()
    {
        parent::boot();

        static::deleting(function ($tenant) {
            $tenant->domains()->delete();
            $tenant->users()->detach();
        });
    }
}
