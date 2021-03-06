<?php

namespace LaravelVersion\Command;

use LaravelVersion\Helper\Version;

class Reset extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version resetter';

    /**
     *
     */
    public function handle()
    {
        $version = Version::reset();
        $this->output->writeln(Version::toString());
        if($version){
            $this->output->writeln('Version resetted.');
        }else{
            $this->output->writeln('Version not resetted!');
        }
    }
}
