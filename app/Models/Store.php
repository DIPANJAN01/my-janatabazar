<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /** @use HasFactory<\Database\Factories\StoreFactory> */
    use HasFactory, HasUuids;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**

     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */

    public function uniqueIds(): array
    {

        return ['id'];
    }
}
