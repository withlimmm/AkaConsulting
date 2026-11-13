<?php

namespace App\Support;

use Illuminate\Support\Str;

/**
 * Builder structured data (schema.org JSON-LD) untuk SEO.
 *
 * Semua schema dibangun sebagai array PHP lalu di-encode dengan json_encode,
 * sehingga teks dari admin (kutip, baris baru, dll.) tidak bisa merusak JSON.
 */
class Seo
{
    public const JSON_FLAGS = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP;

    /** Koordinat cadangan (kantor Lubang Buaya, Jakarta Timur) bila maps_url tidak bisa dibaca. */
    private const FALLBACK_LAT = -6.288013;
    private const FALLBACK_LNG = 106.897191;

    public static function baseUrl(): string
    {
        return rtrim(config('app.url'), '/');
    }

    public static function businessId(): string
    {
        return self::baseUrl() . '/#organization';
    }

    public static function encode(array $schema): string
    {
        return json_encode($schema, self::JSON_FLAGS);
    }

    public static function phoneE164(?string $phone): ?string
    {
        $digits = preg_replace('/[^0-9]/', '', (string) $phone);
        if ($digits === '') {
            return null;
        }
        if (str_starts_with($digits, '0')) {
            $digits = '62' . substr($digits, 1);
        }

        return '+' . $digits;
    }

    /**
     * Ambil koordinat dari URL Google Maps (embed `!3d<lat>!2d<lng>` atau `@lat,lng`).
     *
     * @return array{0: float, 1: float}
     */
    public static function coordinates(?string $mapsUrl): array
    {
        $url = (string) $mapsUrl;

        if (preg_match('/!3d(-?\d+\.\d+).*?!2d(-?\d+\.\d+)/', $url, $m)
            || preg_match('/!2d(-?\d+\.\d+).*?!3d(-?\d+\.\d+)/', $url, $r)) {
            if (! empty($m)) {
                return [(float) $m[1], (float) $m[2]];
            }

            return [(float) $r[2], (float) $r[1]];
        }

        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $m)) {
            return [(float) $m[1], (float) $m[2]];
        }

        return [self::FALLBACK_LAT, self::FALLBACK_LNG];
    }

    /**
     * Pecah alamat bebas dari admin menjadi PostalAddress terstruktur.
     */
    public static function postalAddress(?string $address): array
    {
        $raw = trim((string) $address);
        // Buang label seperti "Alamat PT :" di depan alamat.
        $clean = trim(preg_replace('/^alamat[^:]*:\s*/i', '', $raw));

        $postalCode = preg_match('/\b(\d{5})\b\s*$/', $clean, $m) ? $m[1] : null;

        $locality = 'Jakarta';
        foreach (['Jakarta Timur', 'Jakarta Selatan', 'Jakarta Barat', 'Jakarta Utara', 'Jakarta Pusat'] as $city) {
            if (stripos($clean, $city) !== false) {
                $locality = $city;
                break;
            }
        }

        // Street = bagian sebelum "Kec." / "Kota" / "Kabupaten" (kalau ada).
        $street = preg_split('/,\s*(Kec\.|Kecamatan|Kota|Kab\.|Kabupaten|Daerah Khusus)/i', $clean)[0] ?? $clean;

        return array_filter([
            '@type' => 'PostalAddress',
            'streetAddress' => $street !== '' ? $street : 'Jakarta',
            'addressLocality' => $locality,
            'addressRegion' => 'DKI Jakarta',
            'postalCode' => $postalCode,
            'addressCountry' => 'ID',
        ]);
    }

    public static function logoUrl($settings): string
    {
        return isset($settings) && ! empty($settings->logo_path)
            ? asset('storage/' . $settings->logo_path)
            : asset('images/logo_aka.png');
    }

    /**
     * Schema utama bisnis (LegalService = turunan LocalBusiness) untuk semua halaman.
     */
    public static function localBusiness($settings): array
    {
        [$lat, $lng] = self::coordinates($settings->maps_url ?? null);
        $phone = self::phoneE164($settings->phone ?? null);

        $sameAs = array_values(array_filter([
            $settings->instagram_url ?? null,
            $settings->facebook_url ?? null,
            $settings->linkedin_url ?? null,
            $settings->tiktok_url ?? null,
            $settings->youtube_url ?? null,
            $settings->twitter_url ?? null,
        ]));

        $description = trim(strip_tags((string) ($settings->about_us ?? '')));
        if ($description === '') {
            $description = 'AKA Consulting adalah konsultan hukum dan perizinan usaha di Jakarta. Melayani pendirian PT/CV, perizinan OSS, sertifikasi halal & BPOM, litigasi dan non-litigasi, tender, serta pertanahan untuk perusahaan dan UMKM di Jakarta dan seluruh Indonesia.';
        }

        $jabodetabek = ['Jakarta Timur', 'Jakarta Selatan', 'Jakarta Pusat', 'Jakarta Barat', 'Jakarta Utara', 'Bekasi', 'Depok', 'Bogor', 'Tangerang', 'Tangerang Selatan'];

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'LegalService',
            '@id' => self::businessId(),
            'name' => 'AKA Consulting',
            'legalName' => $settings->company_name ?? 'AKA Consulting',
            'alternateName' => ['AKA Group Consulting', 'AKA Consulting Jakarta'],
            'url' => self::baseUrl() . '/',
            'logo' => self::logoUrl($settings),
            'image' => self::logoUrl($settings),
            'description' => Str::limit($description, 500),
            'priceRange' => 'Rp',
            'telephone' => $phone,
            'email' => $settings->email ?? null,
            'address' => self::postalAddress($settings->address ?? null),
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => $lat,
                'longitude' => $lng,
            ],
            'hasMap' => 'https://www.google.com/maps?q=' . $lat . ',' . $lng,
            'areaServed' => array_merge(
                [['@type' => 'City', 'name' => 'Jakarta']],
                array_map(fn ($c) => ['@type' => 'City', 'name' => $c], $jabodetabek),
                [['@type' => 'Country', 'name' => 'Indonesia']]
            ),
            'knowsAbout' => [
                'Konsultan hukum bisnis', 'Pendirian PT', 'Pendirian CV', 'Perizinan OSS RBA', 'NIB',
                'PBG dan SLF', 'Sertifikasi Halal', 'Izin BPOM', 'Pendaftaran Merek', 'Litigasi',
                'Pengadaan dan Tender', 'Pertanahan',
            ],
            'contactPoint' => array_filter([
                '@type' => 'ContactPoint',
                'telephone' => $phone,
                'contactType' => 'customer service',
                'areaServed' => 'ID',
                'availableLanguage' => ['Indonesian', 'English'],
            ]),
            'openingHoursSpecification' => [[
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '08:00',
                'closes' => '17:00',
            ]],
            'sameAs' => $sameAs,
        ];

        return array_filter($schema, fn ($v) => $v !== null && $v !== []);
    }

    public static function website(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => self::baseUrl() . '/#website',
            'url' => self::baseUrl() . '/',
            'name' => 'AKA Consulting',
            'inLanguage' => 'id-ID',
            'publisher' => ['@id' => self::businessId()],
        ];
    }

    /**
     * @param  array<int, array{0: string, 1: string}>  $items  [nama, url]
     */
    public static function breadcrumb(array $items): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($items)->values()->map(fn ($item, $i) => [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'name' => $item[0],
                'item' => $item[1],
            ])->all(),
        ];
    }

    /**
     * @param  iterable<array{question: string, answer: string}>  $faqs
     */
    public static function faqPage(iterable $faqs): ?array
    {
        $entities = collect($faqs)
            ->map(fn ($f) => [
                'q' => trim(strip_tags((string) data_get($f, 'question'))),
                'a' => trim(strip_tags((string) data_get($f, 'answer'))),
            ])
            ->filter(fn ($f) => $f['q'] !== '' && $f['a'] !== '')
            ->map(fn ($f) => [
                '@type' => 'Question',
                'name' => $f['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
            ])
            ->values()
            ->all();

        if (empty($entities)) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $entities,
        ];
    }
}
