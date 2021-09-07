<?php

namespace App\Services;

use App\Contracts\Parser;
use Illuminate\Support\Facades\Storage;

class ParserService implements Parser
{

    public function getData(string $url): array
    {
        $load = \XmlParser::load($url);

        return $load->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,description,guid,pubDate]'
            ]
        ]);
    }

    public function saveData(string $url): void
    {
        $data = $this->getData($url);
        $e = explode('/', $url);
        $fileName = end($e);
        Storage::append('news/' . $fileName, json_encode($data));
    }
}
