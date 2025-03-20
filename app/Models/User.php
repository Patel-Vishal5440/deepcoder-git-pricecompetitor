<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     // Define available roles as constants
     public const ROLE_SYSTEM_DEVELOPER = 'system_developer';
     public const ROLE_PRICE_MANAGER = 'price_manager';
     public const ROLE_IT_ADMIN = 'it_admin';
 
     /**
      * Get all available roles
      *
      * @return array<string, array<string>>
      */
     public static function getAvailableRoles(): array
     {
         return [
             self::ROLE_SYSTEM_DEVELOPER => [
                 'manage_cron',
                 'manage_products',
                 'manage_competitors',
             ],
             self::ROLE_PRICE_MANAGER => [
                 'find_competitor_urls',
                 'monitor_prices',
             ],
             self::ROLE_IT_ADMIN => [
                 'manage_system_performance',
                 'view_logs',
             ],
         ];
     }
 
     /**
      * Check if user has specific permission
      */
     public function hasPermission(string $permission): bool
     {
         $roles = self::getAvailableRoles();
         return in_array($permission, $roles[$this->role] ?? []);
     }
 
     /**
      * Check if user has specific role
      */
     public function hasRole(string $role): bool
     {
         return $this->role === $role;
     }
}
