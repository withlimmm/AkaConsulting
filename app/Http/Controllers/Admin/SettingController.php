<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = CompanySetting::first() ?? new CompanySetting();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name'  => 'required|string|max:200',
            'email'         => 'required|email|max:150',
            'phone'         => 'required|string|max:50',
            'address'       => 'required|string',
            'about_us'      => 'required|string',
            'vision'        => 'nullable|string',
            'mission'       => 'nullable|string',
            'motto'         => 'nullable|string',
            'maps_url'      => 'nullable|url',
            'instagram_url' => 'nullable|url|max:255',
            'facebook_url'  => 'nullable|url|max:255',
            'linkedin_url'  => 'nullable|url|max:255',
            'tiktok_url'    => 'nullable|url|max:255',
            'youtube_url'   => 'nullable|url|max:255',
            'twitter_url'   => 'nullable|url|max:255',
            'google_site_verification' => 'nullable|string|max:255',
            'whatsapp_text' => 'nullable|string',
            'whatsapp_admins' => 'nullable|array',
            'whatsapp_admins.*.name' => 'nullable|string',
            'whatsapp_admins.*.phone' => 'nullable|string',
        ]);

        if (isset($validated['whatsapp_admins'])) {
            $validated['whatsapp_admins'] = array_filter($validated['whatsapp_admins'], function ($admin) {
                return !empty($admin['name']) && !empty($admin['phone']);
            });
            $validated['whatsapp_admins'] = array_values($validated['whatsapp_admins']);
        }

        $setting = CompanySetting::first();
        if (!$setting) {
            $setting = new CompanySetting();
        }

        $setting->fill($validated);
        $setting->save();

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui!');
    }
}