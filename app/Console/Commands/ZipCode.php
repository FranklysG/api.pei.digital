<?php

namespace App\Console\Commands;

use App\Repositories\DataImportRepository;
use App\Repositories\DataReadRepository;
use Illuminate\Console\Command;

class ZipCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zipcode:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is responsible for importing postal code txt files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $districtPath = resource_path() . '/data/distritos.txt';
        $conselhosPath = resource_path() . '/data/concelhos.txt';
        $postalPath = resource_path() . '/data/todos_cp.txt';
        // $postalPath = resource_path() . '/data/todos_cp_test.txt';
        // $separatePath = resource_path() . '/data/todos_aps.txt';

        $read = new DataReadRepository();
        $district = $read->read($districtPath);
        $cities = $read->read($conselhosPath);
        $concelhos = $read->read($conselhosPath);
        $zipcodes = $read->read($postalPath);
        // $rawSeparate = $read->read($separatePath);

        $import = new DataImportRepository();
        $import->districts($district);
        $import->concelhos($concelhos);
        $import->locations($cities);
        $import->postalCode($zipcodes);
        // $importData->importSeparate($rawSeparate);
    }
}
