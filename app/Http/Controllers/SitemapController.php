<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Article;
use App\Models\Page;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [];
        $baseUrl = config('app.url');

        // 1. Static Pages (Home, Tentang Kami, Portofolio, Blog, Kontak)
        $urls[] = ['loc' => $baseUrl . '/', 'lastmod' => now()->tz('UTC')->toAtomString(), 'changefreq' => 'weekly', 'priority' => '1.0'];
        $urls[] = ['loc' => $baseUrl . '/tentang-kami', 'lastmod' => now()->tz('UTC')->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'];
        $urls[] = ['loc' => $baseUrl . '/layanan', 'lastmod' => now()->tz('UTC')->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.9'];
        $urls[] = ['loc' => $baseUrl . '/portofolio', 'lastmod' => now()->tz('UTC')->toAtomString(), 'changefreq' => 'weekly', 'priority' => '0.8'];
        $urls[] = ['loc' => $baseUrl . '/blog', 'lastmod' => now()->tz('UTC')->toAtomString(), 'changefreq' => 'daily', 'priority' => '0.8'];

        // 2. Dynamic Services
        $services = Service::where('status', 'active')->get();
        foreach ($services as $service) {
            $urls[] = [
                'loc' => $baseUrl . '/layanan/' . $service->slug,
                'lastmod' => $service->updated_at->tz('UTC')->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ];
        }

        // 3. Dynamic Portfolios
        $portfolios = Portfolio::where('status', 'published')->get();
        foreach ($portfolios as $portfolio) {
            $urls[] = [
                'loc' => $baseUrl . '/portofolio/' . $portfolio->slug,
                'lastmod' => $portfolio->updated_at->tz('UTC')->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7'
            ];
        }

        // 4. Dynamic Articles
        $articles = Article::where('status', 'published')->get();
        foreach ($articles as $article) {
            $urls[] = [
                'loc' => $baseUrl . '/blog/' . $article->slug,
                'lastmod' => $article->updated_at->tz('UTC')->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7'
            ];
        }

        // 5. Dynamic Custom Pages
        $pages = Page::where('status', 'published')->get();
        foreach ($pages as $page) {
            $urls[] = [
                'loc' => $baseUrl . '/halaman/' . $page->slug,
                'lastmod' => $page->updated_at->tz('UTC')->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6'
            ];
        }

        return response()->view('sitemap', compact('urls'))->header('Content-Type', 'text/xml');
    }
}
