<?php

namespace LaravelVersion\Command;

use LaravelVersion\Helper\Version;
use LaravelVersion\Helper\VersionHelper;

class Check extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version checker';

    /**
     *
     */
    public function handle()
    {
        $this->output->writeln(Version::toString());
    }
}
