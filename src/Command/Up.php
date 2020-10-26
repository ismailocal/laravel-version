<?php

namespace LaravelVersion\Command;

use LaravelVersion\Helper\GitHelper;
use LaravelVersion\Helper\GitTagHelper;
use LaravelVersion\Helper\VersionHelper;

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
        $versionHelper = new VersionHelper();
        $version = $versionHelper->up($this->argument('level'));
        $this->output->writeln($versionHelper);
        if ($version) {
            try {
                $gitHelper = new GitHelper($versionHelper);
                $gitHelper->add()->commit()->push();
                $this->output->writeln('Git pushed.');

                $gitTagHelper = new GitTagHelper($versionHelper);
                $gitTagHelper->add()->push();
                $this->output->writeln('Git pushed tag.');

                $this->output->writeln('Version upped.');
            } catch (\Exception $exception) {
                $this->output->writeln('Version rollback!.');
                $versionHelper->rollback();
                throw $exception;
            }
        } else {
            $this->output->writeln('Version not upped!');
        }
    }
}