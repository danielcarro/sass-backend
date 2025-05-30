<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TenantUser extends Pivot
{
    protected $table = 'tenant_user';

    protected $fillable = [
        'tenant_id',
        'user_id',
        'role',
    ];

    public $incrementing = true;

    /**
     * Get the tenant associated with this relation.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Get the user associated with this relation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
