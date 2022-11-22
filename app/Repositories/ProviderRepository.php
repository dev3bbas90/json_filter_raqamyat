<?php
namespace App\Repositories;

use App\Interfaces\ProviderInterface;
use App\Traits\fileTrait;

class ProviderRepository implements ProviderInterface
{
    // this Trait for File read, check and control.
    use fileTrait;

    public function transactions( $request = [] )
    {
        $limit = @$request['limit'] ?? 10 ; // data count per each page : default : 10

        // get Content of 3 providers or path provider file name to get only its data
        $data   =   $this->getFilesData();

        return $this->applyFilter($data , $request)->paginate($limit);
    }

    public function applyFilter($data , $request = [])
    {
        $filterable_request_keys = [ "mobile" , "amount" , "currency" , "status" ];
        foreach ($request as $key => $value)
        {
            if(array_search($key , $filterable_request_keys)){
                $data = $data->where($key , $value);
            }
        }
        return $data;
    }

}
