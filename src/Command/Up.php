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
        $isUpdated = Version::up($this->argument('level'));
        if ($isUpdated) {
            $version = Version::toString();
            try {
                $git = new Git();
                $git->add('version.json')
                    ->commit($version . ' version up')
                    ->push();

                $this->output->writeln('Git pushed.');

                $gitTag = new GitTag();
                $gitTag->add($version, 'v' . $version)->push();

                $this->output->writeln('Git pushed tag.');
                $this->output->writeln($version . ' version updated.');
            } catch (\Exception $exception) {
                dd($exception->getMessage());
                Version::rollback();
                throw $exception;
            }
        } else {
            $this->output->writeln($version . ' version not updated!');
        }
    }
}
