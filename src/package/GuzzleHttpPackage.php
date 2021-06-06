<?php
declare(strict_types=1);

namespace knotphp\module\guzzlehttp\package;

use knotlib\kernel\module\PackageInterface;

use knotphp\module\knotpipeline\KnotPipelineModule;
use knotphp\module\guzzlehttp\GuzzleHttpRequestModule;
use knotphp\module\guzzlehttp\GuzzleHttpResponseModule;
use knotphp\module\stk2keventstream\Stk2kEventStreamModule;

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