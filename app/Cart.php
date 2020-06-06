<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Cart
 *
 * @mixin Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @method static Builder|Cart create( $value = null )
 * @method static Builder|Cart find( $value )
 * @method static Builder|Cart newModelQuery()
 * @method static Builder|Cart newQuery()
 * @method static Builder|Cart query()
 * @method static Builder|Cart whereCreatedAt( $value )
 * @method static Builder|Cart whereId( $value )
 * @method static Builder|Cart whereUpdatedAt( $value )
 */
class Cart extends Model
{
    public function products()
    {
        return $this->morphToMany( Product::class, 'productable' )->withPivot( 'quantity' );
    }
}
