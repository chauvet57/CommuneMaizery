<?php

namespace App\Controller;

use Twig\Environment;
use App\Repository\ActiviteRepository;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{ 
    /**
     * @Route("/", name="home")
     * @return Response
     * @param ActiviteRepository
     */
    public function index(ActiviteRepository $activite): Response
    { 
        $activites = $activite->findLatest();

        $client = HttpClient::create();
        $response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?q=Maizery&APPID=aa6f01998a94918df2f823d6a4e54a40&units=metric&lang=fr');

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        //$content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        $parsed_json = json_decode($content);
        $temp = intval($parsed_json->{'main'}->{'temp'});
        $temp_min = intval($parsed_json->{'main'}->{'temp_min'});
        $temp_max = intval($parsed_json->{'main'}->{'temp_max'});
        $pressure = $parsed_json->{'main'}->{'pressure'};
        $humidity = $parsed_json->{'main'}->{'humidity'};
        $city = $parsed_json->{'name'};
        $country = $parsed_json->{'sys'}->{'country'}; 
        $icon = $parsed_json->{'weather'}[0]->{'icon'};
        $descrip = $parsed_json->{'weather'}[0]->{'description'};
        $speed = $parsed_json->{'wind'}->{'speed'};
        $deg = $parsed_json->{'wind'}->{'deg'};
        setlocale(LC_ALL,'fra_fra');
        $dt = strftime('%A %d %B %Y');
        $time = strftime('%X');

        
        return $this->render('pages/home.html.twig',[
            'current_menu' => 'home',
            'temp' => $temp,
            'temp_min' => $temp_min,
            'temp_max' => $temp_max,
            'pressure' => $pressure,
            'humidity' => $humidity,
            'name' => $city,
            'country' => $country,
            'description' => $descrip,
            'icon' => $icon,
            'speed' => $speed,
            'deg' => $deg,
            'dt' => $dt,
            'time' => $time,
            'activites' => $activites

        ]);
    
       
    }
}