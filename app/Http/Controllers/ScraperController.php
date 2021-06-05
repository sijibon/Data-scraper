<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Models\Scraper;
class ScraperController extends Controller
{
    
   private $results = array();

   public function index()
   {
       $allData = Scraper::paginate(20);
       return view('scraper', compact('allData'));
   }


   public function scraper()
   {
       try{
            $data = $this->getData('https://vidnext.net/');
            Scraper::insert($data);
        
            return redirect()->route('index')->with('success','Data successfully scraped');
       }catch(\Exception $e){
           return redirect()->route('index')->with('error','Something went wrong');
           
       }

   }



   private function getData(string $url)
   {
        $client = new Client();
        $page = $client->request('GET', $url);

        $page->filter('.video-block')->each(function($item){
            $arr = [
                'title' => $item->filter('.name')->text(),
                'link'  => $item->filter('a',0)->attr('href')
            ];
            
            array_push($this->results, $arr);
        });

        return $this->results;
   }
}
