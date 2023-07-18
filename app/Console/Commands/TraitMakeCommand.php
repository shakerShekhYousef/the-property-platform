<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class TraitMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:trait';
    protected $signature = 'make:trait {name : Traits name you want to use.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Trait';

    protected function getStub(): string
    {
        return app_path('Models/Traits/Relationship/trait.stub.php');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }

}
