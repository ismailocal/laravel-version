<?php

namespace LaravelVersion\Command;

use LaravelVersion\Helper\Version;
use LaravelVersion\Library\Git;
use LaravelVersion\Library\GitTag;

class Up extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version:up {level}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version upper';

    /**
     *
     */
    public function handle()
    {
        $version = Version::up($this->argument('level'));
        $this->output->writeln(Version::toString());
        if ($version) {
            try {
                $git = new Git(Version::toString());
                $git->add()->commit()->push();
                $this->output->writeln('Git pushed.');

                $gitTag = new GitTag(Version::toString());
                $gitTag->add()->push();
                $this->output->writeln('Git pushed tag.');

                $this->output->writeln('Version upped.');
            } catch (\Exception $exception) {
                $this->output->writeln('Version rollback!.');
                Version::rollback();
                throw $exception;
            }
        } else {
            $this->output->writeln('Version not upped!');
        }
    }
}
