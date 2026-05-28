<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:120',
            'title_id' => 'required|string|max:150',
            'title_en' => 'nullable|string|max:150',
            'short_description_id' => 'required|string',
            'short_description_en' => 'nullable|string',
            'full_description_id' => 'required|string',
            'full_description_en' => 'nullable|string',
            'benefits_id' => 'nullable|string',
            'steps_id' => 'nullable|string',
            'requirements_id' => 'nullable|string',
            'faq_items_id' => 'nullable|string',
            'meta_title_id' => 'nullable|string|max:160',
            'meta_description_id' => 'nullable|string|max:255',
            'meta_keywords_id' => 'nullable|string|max:255',
            'thumbnail_image' => 'nullable|image|max:512',
            'banner_image' => 'nullable|image|max:512',
            'icon_image' => 'nullable|string|max:100', // Material Icon name
            'status' => 'required|in:active,draft',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $thumbnailPath = $request->file('thumbnail_image')?->store('services', 'public');
        $bannerPath = $request->file('banner_image')?->store('services', 'public');

        $service = Service::create([
            'category' => $validated['category'],
            'title' => $this->packLocaleText($validated['title_id'], $validated['title_en'] ?? null),
            'short_description' => $this->packLocaleText($validated['short_description_id'], $validated['short_description_en'] ?? null),
            'full_description' => $this->packLocaleText($validated['full_description_id'] ?? '', $validated['full_description_en'] ?? null),
            'benefits' => $this->packLocaleList($validated['benefits_id'] ?? null),
            'steps' => $this->packLocaleList($validated['steps_id'] ?? null),
            'requirements' => $this->packLocaleList($validated['requirements_id'] ?? null),
            'faq_items' => $this->packLocaleFaqList($validated['faq_items_id'] ?? null),
            'meta_title' => $validated['meta_title_id'] ?? null,
            'meta_description' => $validated['meta_description_id'] ?? null,
            'meta_keywords' => $validated['meta_keywords_id'] ?? null,
            'thumbnail_image' => $thumbnailPath,
            'banner_image' => $bannerPath,
            'icon_image' => $validated['icon_image'] ?? null,
            'status' => $validated['status'],
            'slug' => Str::slug($validated['title_id']),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:120',
            'title_id' => 'required|string|max:150',
            'title_en' => 'nullable|string|max:150',
            'short_description_id' => 'required|string',
            'short_description_en' => 'nullable|string',
            'full_description_id' => 'required|string',
            'full_description_en' => 'nullable|string',
            'benefits_id' => 'nullable|string',
            'steps_id' => 'nullable|string',
            'requirements_id' => 'nullable|string',
            'faq_items_id' => 'nullable|string',
            'meta_title_id' => 'nullable|string|max:160',
            'meta_description_id' => 'nullable|string|max:255',
            'meta_keywords_id' => 'nullable|string|max:255',
            'thumbnail_image' => 'nullable|image|max:512',
            'banner_image' => 'nullable|image|max:512',
            'icon_image' => 'nullable|string|max:100',
            'status' => 'required|in:active,draft',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $thumbnailPath = $service->thumbnail_image;
        if ($request->hasFile('thumbnail_image')) {
            if ($thumbnailPath) {
                Storage::disk('public')->delete($thumbnailPath);
            }
            $thumbnailPath = $request->file('thumbnail_image')->store('services', 'public');
        }

        $bannerPath = $service->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($bannerPath) {
                Storage::disk('public')->delete($bannerPath);
            }
            $bannerPath = $request->file('banner_image')->store('services', 'public');
        }

        $service->update([
            'category' => $validated['category'],
            'title' => $this->packLocaleText($validated['title_id'], $validated['title_en'] ?? null),
            'short_description' => $this->packLocaleText($validated['short_description_id'], $validated['short_description_en'] ?? null),
            'full_description' => $this->packLocaleText($validated['full_description_id'] ?? '', $validated['full_description_en'] ?? null),
            'benefits' => $this->packLocaleList($validated['benefits_id'] ?? null),
            'steps' => $this->packLocaleList($validated['steps_id'] ?? null),
            'requirements' => $this->packLocaleList($validated['requirements_id'] ?? null),
            'faq_items' => $this->packLocaleFaqList($validated['faq_items_id'] ?? null),
            'meta_title' => $validated['meta_title_id'] ?? null,
            'meta_description' => $validated['meta_description_id'] ?? null,
            'meta_keywords' => $validated['meta_keywords_id'] ?? null,
            'thumbnail_image' => $thumbnailPath,
            'banner_image' => $bannerPath,
            'icon_image' => $validated['icon_image'] ?? null,
            'status' => $validated['status'],
            'slug' => Str::slug($validated['title_id']),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus!');
    }

    private function packLocaleText(string $idText, ?string $enText = null): string
    {
        $payload = [
            'id' => trim($idText),
            'en' => trim((string) $enText),
        ];

        if ($payload['en'] === '') {
            unset($payload['en']);
        }

        return json_encode($payload, JSON_UNESCAPED_UNICODE);
    }

    private function packLocaleList(?string $text): ?string
    {
        if ($text === null || trim($text) === '') {
            return null;
        }

        $items = collect(preg_split('/\r\n|\r|\n/', $text))
            ->map(fn ($item) => trim(ltrim($item, "•-\t ")))
            ->filter()
            ->values()
            ->all();

        return json_encode(['id' => $items], JSON_UNESCAPED_UNICODE);
    }

    private function packLocaleFaqList(?string $text): ?string
    {
        if ($text === null || trim($text) === '') {
            return null;
        }

        $items = collect(preg_split('/\r\n|\r|\n/', $text))
            ->map(function ($line) {
                $line = trim(ltrim($line, "•-\t "));
                if ($line === '') {
                    return null;
                }

                $parts = preg_split('/\s*\|\s*/', $line, 2);
                if (count($parts) < 2) {
                    return [
                        'question' => $line,
                        'answer' => '',
                    ];
                }

                return [
                    'question' => trim($parts[0]),
                    'answer' => trim($parts[1]),
                ];
            })
            ->filter(fn ($item) => is_array($item) && trim($item['question']) !== '')
            ->values()
            ->all();

        return json_encode(['id' => $items], JSON_UNESCAPED_UNICODE);
    }
}