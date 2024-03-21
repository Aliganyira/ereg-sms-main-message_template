<?php


namespace App\Console\Commands;


use Illuminate\Container\Container;
use Illuminate\Support\Str;

class Utils
{
    private $package;
    private $stubDetails;
    private $packageMainFolder;

    /**
     * Utils constructor.
     * @param string $domain
     */
    public function __construct(string $domain,$package_folder)
    {
        $this->package = $domain;
        $this->packageMainFolder = $package_folder;
        $this->parsePackage();
    }

    /**
     * @return array
     */
    public function     getStubDetails(): array
    {
        return $this->stubDetails;
    }



    protected function parsePackage()
    {
        $this->stubDetails['{{ package }}'               ] = $this->package;
        $this->stubDetails['{{ package.folder }}'        ] = Str::ucfirst(Str::camel($this->packageMainFolder));
        $this->stubDetails['{{ package.folder.slug }}'   ] = Str::slug($this->packageMainFolder);
        $this->stubDetails['{{ package.camel.plural }}'  ] = Str::plural(Str::camel($this->package));
        $this->stubDetails['{{ package.slug.plural }}'   ] = Str::plural(Str::slug($this->package));
        $this->stubDetails['{{ package.snake.plural }}'  ] = Str::plural(Str::snake($this->package));
        $this->stubDetails['{{ package.class.plural }}'  ] = Str::plural(Str::studly($this->package));
        $this->stubDetails['{{ package.camel.singular }}'] = Str::singular(Str::camel($this->package));
        $this->stubDetails['{{ package.slug.singular }}' ] = Str::singular(Str::slug($this->package));
        $this->stubDetails['{{ package.snake.singular }}'] = Str::singular(Str::snake($this->package));
        $this->stubDetails['{{ package.class.singular }}'] = Str::singular(Str::studly($this->package));
    }

}
