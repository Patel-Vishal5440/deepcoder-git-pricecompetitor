<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeratorPermissions extends Model
{
    protected $table = 'moderator_permissions';
    protected $fillable = ['moderator_id', 'permission_id'];

    public function moderator()
    {
        return $this->belongsTo(Moderator::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permissions::class);
    }
}
