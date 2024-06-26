<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function showProduct(User $user, Product $product)
    {
        return $user->role === ROLE_ADMIN || $user->id === $product->owner_id;
    }

    public function updateProduct(User $user, Product $product)
    {
        return $user->role === ROLE_ADMIN || $user->id === $product->owner_id;
    }

    public function deleteProduct(User $user, Product $product)
    {
        return $user->role === ROLE_ADMIN || $user->id === $product->owner_id;
    }
}
