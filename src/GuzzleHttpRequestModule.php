<?php
declare(strict_types=1);

namespace KnotPhp\Module\GuzzleHttp;

use Throwable;

use GuzzleHttp\Psr7\ServerRequest;

use KnotLib\Kernel\Exception\ModuleInstallationException;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ComponentModule;
use KnotLib\Kernel\Module\Components;
use KnotLib\Kernel\EventStream\Channels;
use KnotLib\Kernel\EventStream\Events;
use KnotLib\Support\Adapter\PsrRequestAdapter;

class GuzzleHttpRequestModule extends ComponentModule
{
    /**
     * Declare dependent on components
     *
     * @return array
     */
    public static function requiredComponents() : array
    {
        return [
            Components::EVENTSTREAM,
            Components::DI,
        ];
    }

    /**
     * Declare component type of this module
     *
     * @return string
     */
    public static function declareComponentType() : string
    {
        return Components::REQUEST;
    }

    /**
     * Install module
     *
     * @param ApplicationInterface $app
     *
     * @throws ModuleInstallationException
     */
    public function install(ApplicationInterface $app)
    {
        try{
            $request = ServerRequest::fromGlobals();
            $app->request(new PsrRequestAdapter($request));

            // fire event
            $app->eventstream()->channel(Channels::SYSTEM)->push(Events::REQUEST_ATTACHED, $app->request());
        }
        catch(Throwable $e)
        {
            throw new ModuleInstallationException(self::class, $e->getMessage(), 0, $e);
        }
    }
}