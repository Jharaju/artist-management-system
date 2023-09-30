<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $sliderRepository, $view_data, $postRepository, $eventRepository, $donationRepository;
    private $roleRepository;
    private $userRepository;
    private $request;

    public function __construct(
        PostRepository $postRepository,
        Request $request,

    ) {
        $this->postRepository = $postRepository;
        $this->request = $request;
    }


    public function slug($slug = null)
    {
        $slug = $slug ? $slug : 'index';
        $this->view_data['pageContent'] = $this->postRepository->findBySlug($slug, false);
        $file_path = resource_path() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'website/pages' . DIRECTORY_SEPARATOR . $slug . '.blade.php';
        if (file_exists($file_path)) {
            switch ($slug) {
                case 'index':
                    $this->view_data['banners'] = $this->postRepository->findBy('type', 'homepage_banner', '=', false, 3);
                    $this->view_data['services'] = $this->postRepository->findBy('type', 'services', '=', false, 3);
                    $this->view_data['blogs'] = $this->postRepository->findBy('type', 'news', '=', false, 4);
                    $this->view_data['blog'] = $this->postRepository->findById(5);
                    break;
                case 'about':
                    $this->view_data['testimonial'] = $this->postRepository->findBy('type', 'testimonial', '=');
                    $this->view_data['testimonials'] = $this->postRepository->findById(4);

                    break;
                case 'events':
                    $this->view_data['event'] = $this->eventRepository->findBy('type', 'events', '=');
                    $this->view_data['testimonial'] = $this->postRepository->findBy('type', 'testimonial', '=');

                    break;
                case 'blog':
                    $this->view_data['blogs'] = $this->postRepository->findBy('type', 'news', '=', false, 4);
                    $this->view_data['blog'] = $this->postRepository->findById(5);
                    $this->view_data['testimonial'] = $this->postRepository->findBy('type', 'testimonial', '=');
                    break;
                case 'contact':
                    $this->view_data['testimonial'] = $this->postRepository->findBy('type', 'testimonial', '=');
                    break;
                case 'SingleEvents':
                    $this->view_data['company_info'] = $this->postRepository->findById(2);
                    $this->view_data['testimonials'] = $this->postRepository->findBy('type', 'testimonial', '=');
                    $this->view_data['services'] = $this->postRepository->findBy('type', 'services', '=', false, 6);
                    $this->view_data['Subscribe'] = $this->postRepository->findById(9);
                    break;
                case 'donation':
                    $this->view_data['Subscribe'] = $this->postRepository->findById(9);

                    break;
            }
            return view('website.pages.' . $slug, $this->view_data);
        }
        // 3. No page exist (404)
        return view('web.pages.404', $this->view_data);
    }
}
