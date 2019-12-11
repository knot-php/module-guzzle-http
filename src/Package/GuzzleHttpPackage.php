<?php
declare(strict_types=1);

namespace KnotPhp\Module\GuzzleHttp\Package;

use KnotLib\Kernel\Module\PackageInterface;
use KnotPhp\Module\KnotPipeline\KnotPipelineModule;
use KnotPhp\Module\GuzzleHttp\GuzzleHttpRequestModule;
use KnotPhp\Module\GuzzleHttp\GuzzleHttpResponseModule;
use KnotPhp\Module\Stk2kEventStream\Stk2kEventStreamModule;

class GuzzleHttpPackage implements PackageInterface
{
    /**
     * Get package module list
     *
     * @return string[]
     */
    public static function getModuleList() : array
    {
        return [
            KnotPipelineModule::class,
            Stk2kEventStreamModule::class,
            GuzzleHttpRequestModule::class,
            GuzzleHttpResponseModule::class,
        ];
    }
}