<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt( $value )
 * @method static Builder|User whereEmail( $value )
 * @method static Builder|User whereEmailVerifiedAt( $value )
 * @method static Builder|User whereId( $value )
 * @method static Builder|User whereName( $value )
 * @method static Builder|User wherePassword( $value )
 * @method static Builder|User whereRememberToken( $value )
 * @method static Builder|User whereUpdatedAt( $value )
 * @mixin Eloquent
 * @property \Illuminate\Support\Carbon|null $admin_since
 * @property-read \App\Image|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Payment[] $payments
 * @property-read int|null $payments_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAdminSince($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin_since'
    ];

    protected $dates = [ 'admin_since' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany( Order::class, 'customer_id' );
    }

    public function payments()
    {
        return $this->hasManyThrough( Payment::class, Order::class, 'customer_id' );
    }

    public function image()
    {
        return $this->morphOne( Image::class, 'imageable' );
    }
}
