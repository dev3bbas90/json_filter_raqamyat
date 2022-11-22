<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_checkListTransactionsStatus()
    {
        $response = $this->get('/api/transactions');
        $response->assertStatus(200);
    }

    public function test_searchVendorsByRightCurrency()
    {
        $response = $this->get('/api/transactions?limit=10&page=1&currency=EGP');
        $data     = $response['data']['data'];
        $this->assertCount(3 , $data );
    }

    public function test_searchVendorsByWrongCurrency()
    {
        $response = $this->get('/api/transactions?limit=10&page=1&currency=EGP2');
        $data     = $response['data']['data'];
        $this->assertCount(0 , $data );
    }

    public function test_searchVendorsByRightMobile()
    {
        $response = $this->get('/api/transactions?limit=10&page=1&mobile=0020111111112');
        $data     = $response['data']['data'];
        $this->assertCount(3 , $data );
    }

    public function test_searchVendorsByWrongMobile()
    {
        $response = $this->get('/api/transactions?limit=10&page=1&mobile=00201111111122');
        $data     = $response['data']['data'];
        $this->assertCount(0 , $data );
    }


}
