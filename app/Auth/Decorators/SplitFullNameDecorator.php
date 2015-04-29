<?php namespace ThreeAccents\Auth\Decorators;

use ThreeAccents\Packages\CommandBus\Contracts\CommandBus;

class SplitFullNameDecorator implements CommandBus
{

    public function execute($command)
    {
        $boom = explode(' ', $command->full_name);

        $count = count($boom);

        if($count == 1)
        {
            $command->first_name = $boom[0];
            $command->last_name = '';
        }
        else
        {
            $command->first_name = $boom[0];
            $command->last_name = $boom[1];
        }
    }
}