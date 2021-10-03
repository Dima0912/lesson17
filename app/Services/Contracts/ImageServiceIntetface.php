<?php

namespace App\Services\Contracts;

interface ImageServiceInterface
{
    public static function upload($images);
    public static function remove($images);
}