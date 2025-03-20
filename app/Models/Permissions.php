<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permissions extends Model
{
    protected $fillable = ['name'];

    public function moderators()
    {
        return $this->belongsToMany(Moderator::class, 'moderator_permissions', 'permission_id', 'moderator_id');
    }
    
}