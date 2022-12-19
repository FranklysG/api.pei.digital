<?php

namespace App\Repositories;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class DataReadRepository
{
    public function read(String $filename)
    {
        try
        {
            $file = utf8_encode(File::get($filename));

            return $this->transform($file);

        }
        catch (FileNotFoundException $exception)
        {
            return $exception->getMessage();
        }
    }

    /**
     * @param String $file
     * @return array
     */
    private function transform(String $file): array
    {
        $data =  explode("\n", $file);
        $convertData = [];

        foreach ($data as $key => $row)
        {
            if($row === '') continue;
            $tmp = explode(";", $row);
            $convertData[] = $tmp;

        }
        
        return $convertData;
    }
}