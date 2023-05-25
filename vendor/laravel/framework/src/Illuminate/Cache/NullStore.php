<?php

namespace Illuminate\Cache;

use Illuminate\Contracts\Cache\Store;

class NullStore extends TaggableStore implements Store
{
    use RetrievesMultipleKeys;

    /**
     * The array of stored values.
     *
     * @var array
     */
    protected $storage = [];

    /**
     * Retrieve an product from the cache by key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get($key)
    {
        //
    }

    /**
     * Store an product in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  float|int  $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        //
    }

    /**
     * Increment the value of an product in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return int
     */
    public function increment($key, $value = 1)
    {
        //
    }

    /**
     * Decrement the value of an product in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return int
     */
    public function decrement($key, $value = 1)
    {
        //
    }

    /**
     * Store an product in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function forever($key, $value)
    {
        //
    }

    /**
     * Remove an product from the cache.
     *
     * @param  string  $key
     * @return void
     */
    public function forget($key)
    {
        //
    }

    /**
     * Remove all items from the cache.
     *
     * @return bool
     */
    public function flush()
    {
        return true;
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return '';
    }
}
