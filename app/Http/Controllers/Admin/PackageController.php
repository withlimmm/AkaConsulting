<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('sort_order')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        
        // Convert features textarea lines into JSON array
        if (!empty($data['features'])) {
            $featuresArray = array_filter(array_map('trim', explode("\n", $data['features'])));
            $data['features'] = $featuresArray;
        } else {
            $data['features'] = [];
        }

        $data['is_popular'] = $request->has('is_popular');
        $data['sort_order'] = $request->sort_order ?? 0;

        Package::create($data);

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Package $package)
    {
        // Convert JSON array back to string for textarea
        $package->features_text = is_array($package->features) ? implode("\n", $package->features) : '';
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        
        // Convert features textarea lines into JSON array
        if (!empty($data['features'])) {
            $featuresArray = array_filter(array_map('trim', explode("\n", $data['features'])));
            $data['features'] = $featuresArray;
        } else {
            $data['features'] = [];
        }

        $data['is_popular'] = $request->has('is_popular');
        $data['sort_order'] = $request->sort_order ?? 0;

        $package->update($data);

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil dihapus.');
    }
}
