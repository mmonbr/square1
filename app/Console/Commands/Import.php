<?php

namespace App\Console\Commands;

use App\Recipe\Irons;
use App\Recipe\Audio;
use App\Recipe\Recipe;
use App\Recipe\Heating;
use App\Recipe\Microwaves;
use App\Recipe\Essentials;
use App\Recipe\Dishwashers;
use App\Recipe\PersonalCare;
use App\Recipe\SmallCooking;
use App\Recipe\CoffeeMachines;
use Illuminate\Console\Command;
use App\Recipe\FoodPreparation;
use App\Import\ProductImporter;
use App\Recipe\KettlesAndToasters;
use App\Repository\ProductRepository;
use App\Repository\DOMProductRepository;

class Import extends Command
{
    private $categories = [
        'audio'                => Audio::class,
        'coffee-machines'      => CoffeeMachines::class,
        'dishwashers'          => Dishwashers::class,
        'essentials'           => Essentials::class,
        'food-preparation'     => FoodPreparation::class,
        'heating'              => Heating::class,
        'irons'                => Irons::class,
        'kettles-and-toasters' => KettlesAndToasters::class,
        'microwaves'           => Microwaves::class,
        'personal-care'        => PersonalCare::class,
        'small-cooking'        => SmallCooking::class
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import {category?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data from AppliancesDelivered.ie';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();

        app()->bind(
            ProductRepository::class,
            DOMProductRepository::class
        );
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(count($this->categories));

        foreach ($this->categories as $category) {
            $this->info("Importing products from {$category}...");

            app()->bind(Recipe::class, $category);

            app(ProductImporter::class)->import();

            $bar->advance();
        }

        $bar->finish();
    }
}