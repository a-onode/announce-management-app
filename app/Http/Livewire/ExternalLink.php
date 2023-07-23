<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;
use DOMDocument;

class ExternalLink extends Component
{
    public $announce;
    public $title;

    public function mount($announce)
    {
        $this->announce = $announce;
    }

    public function getTitleUrl()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($this->announce->url);
        $html = $response->getBody();
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);
        $titleElement = $dom->getElementsByTagName('title')->item(0);
        $this->title = $titleElement->nodeValue;
    }

    public function render()
    {
        return view('livewire.external-link', [
            'title' => $this->title,
        ]);
    }
}
