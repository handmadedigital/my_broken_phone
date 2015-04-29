<?php namespace ThreeAccents\Auth\Decorators;

use ThreeAccents\Auth\Http\Sanitizers\RegisterSanitizer;
use ThreeAccents\Packages\CommandBus\Contracts\CommandBus;

class RegisterSanitizerDecorator implements CommandBus
{
    /**
     * @var RegisterSanitizer
     */
    protected $registerSanitizer;

    /**
     * @param RegisterSanitizer $registerSanitizer
     */
    function __construct(RegisterSanitizer $registerSanitizer)
    {
        $this->registerSanitizer = $registerSanitizer;
    }

    /**
     * @param $command
     */
    public function execute($command)
    {
        $this->registerSanitizer->sanitize($command);
    }
}