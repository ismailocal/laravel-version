<?php

namespace LaravelVersion\Command;

use LaravelVersion\Helper\Version;
use LaravelVersion\Helper\VersionHelper;

class Generate extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version generator';

    /**
     *
     */
    public function handle()
    {
        $version = Version::generate();
        $this->output->writeln(Version::toString());
        if($version){
            $this->output->writeln('Version generated.');
        }else{
            $this->output->writeln('Version not generated!');
        }
    }
}
