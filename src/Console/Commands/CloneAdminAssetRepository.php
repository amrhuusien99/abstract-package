<?php

namespace DevxPackage\Console\Commands;

use Illuminate\Console\Command;

class CloneAdminAssetRepository extends Command
{
    /**
     *
     * @var string
     */
    protected $signature = 'git:clone-admin-asset';

    /**
     *
     * @var string
     */
    protected $description = 'Clone a GitHub repository to a specific destination';

    /**
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Checking for Git installation...');
        if (!shell_exec('git --version')) {
            $this->error('Git is not installed or not available in PATH.');
            return 1;
        }
        $this->info('Cloning repository...');
        $repository = 'https://github.com/amrhuusien99/admin-asset-new.git';
        // $repository = 'https://github.com/amrhuusien99/admin-asset.git';
        $destination = public_path('admin');
        $command = "git clone $repository $destination 2>&1";
        $output = shell_exec($command);
        if (stripos($output, 'fatal') !== false || stripos($output, 'error') !== false) {
            $this->error('Failed to clone repository. Error: ' . $output);
            return 1;
        }
        $this->info('Repository cloned successfully into: ' . $destination);

    }
}