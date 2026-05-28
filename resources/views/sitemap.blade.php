{!! '<'.'?xml version="1.0" encoding="UTF-8"?'.'>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->setTimezone('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/layanan') }}</loc>
        <lastmod>{{ now()->setTimezone('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/portofolio') }}</loc>
        <lastmod>{{ now()->setTimezone('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/tentang-kami') }}</loc>
        <lastmod>{{ now()->setTimezone('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/blog') }}</loc>
        <lastmod>{{ now()->setTimezone('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach ($services as $service)
    <url>
        <loc>{{ url('/layanan/' . $service->slug) }}</loc>
        <lastmod>{{ $service->updated_at->setTimezone('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($portfolios as $portfolio)
    <url>
        <loc>{{ url('/portofolio/' . $portfolio->slug) }}</loc>
        <lastmod>{{ $portfolio->updated_at->setTimezone('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    @foreach ($articles as $article)
    <url>
        <loc>{{ url('/blog/' . $article->slug) }}</loc>
        <lastmod>{{ $article->updated_at->setTimezone('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
