<?php


namespace SidorkinAlex\Weatherapp\save;


class Saver
{
    const SAVE_DIR = "savedfile/";

    public function __construct()
    {

    }

    public function save($data, $format)
    {
        $this->checkdir();
        $filename = self::SAVE_DIR . time() . ".{$format}";
        file_put_contents($filename, $data);
    }

    private function checkdir()
    {
        if (!file_exists(self::SAVE_DIR)) {
            mkdir(self::SAVE_DIR, 0777, true);
        }
    }
}