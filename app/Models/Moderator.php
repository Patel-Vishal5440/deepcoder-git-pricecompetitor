<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Permissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ModeratorPermissions;
class Moderator extends Authenticatable implements HasMedia
{
    use HasFactory,InteractsWithMedia, Notifiable;

    public const TYPE_SUPER_ADMIN = 'super_admin';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'status',
        'type',
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('moderatorImage')->singleFile()->useFallbackUrl(asset('assets/images/user.png'));
    }

    public function hasPermission(string $permission): bool
    {
        // Check if the moderator has the specified permission
        return $this->permissions()->whereIn('permission_id', function($query) use ($permission) {
            $query->select('id')->from('permissions')->where('name', $permission);
        })->exists();
    }

    public function hasAnyPermission($permission)
    {
        // Check if the moderator has the specified permission
        return $this->permissions()->whereIn('permission_id', function($query) use ($permission) {
            $query->select('id')->from('permissions')->where('name', $permission);
        })->exists();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'moderator_permissions', 'moderator_id', 'permission_id');
    }

    public function getPermissionsAttribute()
    {
        return $this->permissions()->pluck('name');
    }

    public function moderatorPermissions()
    {
        return $this->hasMany(ModeratorPermissions::class);
    }
    
}
