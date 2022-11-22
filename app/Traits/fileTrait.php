<?php
namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

trait fileTrait
{
    public function providers()
    {
        return [
            "uploads/DataW.json",
            "uploads/DataX.json",
            "uploads/DataY.json"
        ];
    }

    public function getFilesData($file = null)
    {
        // get only selected file date if we path file path otherwise get all 3 files.
        $providersFiles =   $file   ?   [$file] :   $this->providers();
        // init with empty initial collection to merge files collections with it.
        $providersData  =   new Collection([]);

        foreach ($providersFiles as $providerFile)
        {
            // check if file is exists first
            $providerFile =  $this->filesExists($providerFile) ? $providerFile : 'public/' . $providerFile;
            if( $this->filesExists($providerFile) )
            {
                $file_content       =   File::get( $providerFile ); // return file content

                // decode content then convert it to collection
                $collected_content  =   collect( json_decode($file_content, true));

                // merge this data with other collections
                $providersData      =   $providersData->merge( $collected_content );
            }
        }
        return $providersData;
    }

    public function filesExists($file_path)
    {
        return File::exists($file_path);
    }



}
