<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
            <loc>https://www.citriclabs.com/</loc>
             <lastmod>{{ date('Y-m-d\Th:i:s'.'+00:00') }}</lastmod>
            <priority>1.00</priority>
        </url>
    @foreach ($pages as $page)
      @if($page->id !=5)
        <url>
            <loc>{{ url($page->slug) }}</loc>
             <lastmod>{{ date('Y-m-d\Th:i:s'.'+00:00') }}</lastmod>
            <priority>0.80</priority>
        </url>
        @endif
    @endforeach
    @foreach ($categories as $category)
        <url>
            <loc>{{ url($category->slug) }}</loc>
             <lastmod>{{ date('Y-m-d\Th:i:s'.'+00:00') }}</lastmod>
            <priority>0.9</priority>
        </url>
    @endforeach
    @foreach ($products as $product)
        <url>
            <loc>{{ url($product->slug) }}</loc>
             <lastmod>{{ date('Y-m-d\Th:i:s'.'+00:00') }}</lastmod>
            <priority>0.64</priority>
        </url>
    @endforeach
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ url($blog->slug) }}</loc>
              <lastmod>{{ date('Y-m-d\Th:i:s'.'+00:00') }}</lastmod>
            <priority>0.51</priority>
        </url>
    @endforeach
</urlset>