<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class GeneratePlatformPackage extends Command
{
    /**
     * @var Filesystem $filesystem
     */
    protected $filesystem;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'platform:generate-package {package}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate platform package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $root_package_folder = 'packages/';
    protected $main_folder;

    public function __construct()
    {
        parent::__construct();

        $adapter = new Local(base_path());
        $this->filesystem = new Filesystem($adapter);
    }

    /**
     * @param string $folder
     */
    protected function generateFolder(string $folder): void
    {
        // $this->comment(PHP_EOL.'Generating ' . $folder . ' folder...');
        $this->filesystem->createDir($folder);
        // $this->info('Generated ' . $folder . ' folder...');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->name = $package_name =  $this->argument('package');//$this->ask('What is your Package name?');
        $main_folder = $this->anticipate('Where is this package (' . $package_name . ') going to be located (Front/Admin) ?', ['Front', 'Admin'],'Admin');
        $this->main_folder = Str::ucfirst(Str::camel($main_folder)) . '/';
//        $this->name = $this->argument('package');
        $this->comment("Setting up platform package: " . $this->name . "...");

        $utils = new Utils($this->name,$main_folder);
        $parsed = $utils->getStubDetails();

        $this->generateFolder($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Database/Factories');
        $this->generateFolder($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Database/Migrations');
        $this->generateFolder($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Database/Seeds');
        $this->generateFolder($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Http/Controllers');
        $this->generateFolder($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Models');
        $this->generateFolder($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/routes');
        $this->generateFolder($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/resources/views');

        $stub = $this->filesystem->read('stubs/app_stubs/composer.json.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/composer.json', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/controller.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Http/Controllers/' . $parsed['{{ package.class.plural }}'] . 'Controller.php', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/model.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Models/' . $parsed['{{ package.class.singular }}'] . '.php', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/routes_web.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/routes/web.php', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/routes_api.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/routes/api.php', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/index.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/resources/views/index.blade.php', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/serviceprovider.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/' . $parsed['{{ package.class.plural }}'] . 'ServiceProvider.php', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/factory.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Database/Factories/' . $parsed['{{ package.class.singular }}'] . 'Factory.php', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/migration.create.stub');
        $data = strtr($stub, $parsed);
        $signature = date('Y_m_d_His');
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Database/Migrations/' . $signature . '_create_' . $parsed['{{ package.snake.plural }}'] . '_table.php', $data);

        $stub = $this->filesystem->read('stubs/app_stubs/seeder.stub');
        $data = strtr($stub, $parsed);
        $this->filesystem->put($this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}'] . '/Database/Seeds/' . $parsed['{{ package.class.singular }}'] . 'Seeder.php', $data);

        $this->info($this->name . " Completed Setting up Successfully" . PHP_EOL . 'Located in =>' . $this->root_package_folder .$this->main_folder. $parsed['{{ package.class.plural }}']);
        return 0;
    }
}
