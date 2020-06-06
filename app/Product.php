<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Product
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property float $price
 * @property int $stock
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product find( $value )
 * @method static Builder|Product findOrFail( $value )
 * @method static Builder|Product whereCreatedAt( $value )
 * @method static Builder|Product whereDescription( $value )
 * @method static Builder|Product whereId( $value )
 * @method static Builder|Product where( $column, $operator = null, $value = null, $boolean = 'and' )
 * @method static Builder|Product wherePrice( $value )
 * @method static Builder|Product whereStatus( $value )
 * @method static Builder|Product whereStock( $value )
 * @method static Builder|Product whereTitle( $value )
 * @method static Builder|Product whereUpdatedAt( $value )
 * @method static Builder|Product create( $value )
 * @method static Builder|Product available
 * @mixin Eloquent
 *  */
// * @property-read \Illuminate\Database\Eloquent\Collection|\App\Cart[] $carts
// * @property-read int|null $carts_count
// * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
// * @property-read int|null $images_count
// * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
// * @property-read int|null $orders_count
// * @method static \Illuminate\Database\Eloquent\Builder|\App\Product available()

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'stock', 'status'
    ];


    public function carts()
    {
        return $this->morphedByMany( Cart::class, 'productable' )->withPivot( 'quantity' );
    }

    public function orders()
    {
        return $this->morphedByMany( Order::class, 'productable' )->withPivot( 'quantity' );
    }

    public function images()
    {
        return $this->morphMany( Image::class, 'imageable' );
    }

    public function scopeAvailable( $query )
    {
        return $query->where( 'status', 'available' );
    }

}
