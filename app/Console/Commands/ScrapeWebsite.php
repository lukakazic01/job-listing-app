<?php

namespace App\Console\Commands;

use App\Models\CompanySize;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeWebsite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrape-website';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape infostud countries for now';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://accounts.hrlab.rs/register');
        $html = $response->getBody()->getContents();
        $crawler = new Crawler($html);
        $companySizes = $crawler->filter('#registration_form_employeeCountOption')->children()->each(function (Crawler $node) {
            $value = ["size" => $node->text()];
            if ($value["size"] !== "Izaberi") return $value;
        });
        $filtered = array_filter($companySizes, fn ($size) => $size !== null);
        CompanySize::insert($filtered);
    }
}
