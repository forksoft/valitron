<?php

namespace Valitron;

class Arr
{
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  array  $array
     * @param  string|int|null  $key
     * @return mixed
     */
    public static function get(array $array, $key)
    {
        if (is_null($key)) {
            return $array;
        }

        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return $array[$key] ?? null;
        }

        foreach (explode('.', $key) as $segment) {
            if (array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return null;
            }
        }

        return $array;
    }
}