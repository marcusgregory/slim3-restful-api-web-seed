<?php

namespace App\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Command.
 *
 * @author John Doe <john.doe@example.com>
 *
 * @category Command
 *
 * @see https://example.com
 */
class Command extends AbstractCommand
{
    /**
     * @return array
     */
    public function arguments(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return '';
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {
        // ...
    }

    /**
     * @return string
     */
    public function help(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return '';
    }

    /**
     * @return array
     */
    public function options(): array
    {
        return [];
    }
}