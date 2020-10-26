<?php

namespace App\Controller;

use App\Entity\Language;
use App\Entity\Sheet;
use App\Entity\Tutorial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteMapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
     */
    public function index(Request $request)
    {
        $hostname = $request->getSchemeAndHttpHost();

        $urls = [];

        $urls[] = [
            'loc' => $this->generateUrl('home'),
            'priority' => '1.00',
        ];
        $urls[] = [
            'loc' => $this->generateUrl('app_register'),
            'priority' => '0.70'
            ];
        $urls[] = [
            'loc' => $this->generateUrl('app_login'),
            'priority' => '0.70'
        ];
        $urls[] = [
            'loc' => $this->generateUrl('_about'),
            'priority' => '0.70'
            ];

        foreach ($this->getDoctrine()->getRepository(Sheet::class)->findAll() as $sheet) {
            $urls[] = [
                'loc' => $this->generateUrl('sheet_show', [
                    'slugLanguage' => $sheet->getLanguage()->getSlug(),
                    'slug' => $sheet->getSlug(),
                ]),
                'lastmod' => $sheet->getUpdateAt() ? $sheet->getUpdateAt()->format('Y-m-d\TH:i:s') : '',
                'priority' => '0.80'
            ];
        }

        foreach ($this->getDoctrine()->getRepository(Tutorial::class)->findAll() as $tutorial) {
            $urls[] = [
                'loc' => $this->generateUrl('tutorial_show', [
                    'language' => $tutorial->getLanguage()->getSlug(),
                    'slug' => $tutorial->getSlug(),
                ]),
                'lastmod' => $tutorial->getUpdateAt()? $tutorial->getUpdateAt()->format('Y-m-d\TH:i:s') : '',
                'priority' => '0.90',
            ];
        }

        foreach ($this->getDoctrine()->getRepository(Language::class)->findAll() as $language) {
            $urls[] = [
                'loc' => $this->generateUrl('language_show', [
                    'slug' => $language->getSlug(),
                ]),
                'lastmod' => $language->getUpdateAt()? $language->getUpdateAt()->format('Y-m-d\TH:i:s') : '',
                'priority' => '0.90',
            ];
        }

        $response = new Response(
            $this->renderView('sitemap/index.html.twig', ['urls' => $urls,
                'hostname' => $hostname]),
            200
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}
