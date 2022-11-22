<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\ProviderController;
use App\Interfaces\ProviderInterface;
use App\Repositories\ProviderRepository;
use App\Traits\fileTrait;
use Mockery;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use fileTrait;
    /**
     * Read File Content
     *
     * @return void
    */
    public function test_readFileContent()
    {
        $vendor_transactions = $this->getFilesData("uploads/DataW.json");
        $this->assertCount( 3 , $vendor_transactions , 'No Transactions returned!!');
    }

    /**
     * Test Filter Transactions by currency
     *
     * @return void
    */
    public function test_FilterTransaxtions()
    {
        $providerInterface = new ProviderRepository;

        $ProviderController = new ProviderController($providerInterface);

        $vendor_transactions = $this->getFilesData("uploads/DataW.json");

        $filtered_transactions = $ProviderController->applyFilter($vendor_transactions , ['currency' => 'EGP']);
        $this->assertCount( 1 , $filtered_transactions , 'No Transactions returned!!');
    }



}
