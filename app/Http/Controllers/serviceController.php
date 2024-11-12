<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $countServicePublish = Service::where('is_publish', 1)->count();
        $countServiceUnpublish = Service::where('is_publish', 0)->count();
        $countAllService = Service::count();
        $category = $request->query('category');

        if ($category) {
            if ($category === 'publish') {
                $services = Service::where('is_publish', 1)
                    ->with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            } elseif ($category === 'draft') {
                $services = Service::where('is_publish', 0)
                    ->with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            } else {
                $services = Service::with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            }
        } else {
            $services = Service::with(['category', 'ratings'])
                ->get()
                ->toArray();
        }

        $services = array_map(function ($service) {
            $service['image_preview'] = asset('storage/' . $service['image_preview']);
            $service['image_header'] = asset('storage/' . $service['image_header']);
            $service['image_content'] = json_decode($service['image_content']);
            $service['image_content'] = array_map(function ($image) {
                return asset('storage/' . $image);
            }, $service['image_content']);

            $service['category_name'] = $service['category']['name'] ?? 'No Category';

            $service['created_at'] = Carbon::parse($service['created_at'])->format('d M Y, H:i');
            $service['updated_at'] = Carbon::parse($service['updated_at'])->format('d M Y, H:i');

            $ratings = $service['ratings'];
            $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
            $service['average_rating'] = $averageRating;

            return $service;
        }, $services);

        return view('service.index', compact('services', 'countServicePublish', 'countServiceUnpublish', 'countAllService'));
    }

    public function create()
    {
        $category = Category::all()->where('type', 'service')->toArray();
        return view('service.create', compact('category'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:tbl_category,id',
            'image_preview' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_header' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_content.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()
                ->with('error_messages', $validate->errors()->all());
        }

        $imagePreview = $request->file('image_preview')->store('services', 'public');
        $imageHeader = $request->file('image_header')->store('services', 'public');

        $imageContent = [];
        foreach ($request->file('image_content') as $image) {
            $imageContent[] = $image->store('services', 'public');
        }

        $service = Service::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'is_publish' => $request->is_publish,
            'image_preview' => $imagePreview,
            'image_header' => $imageHeader,
            'image_content' => json_encode($imageContent),
        ]);

        return redirect()->route('service.index')->with('success', 'Service created successfully');
    }

    public function show($uuid)
    {
        $service = Service::where('uuid', $uuid)->with(['category', 'ratings.user', 'user'])->first()->toArray();

        $service['image_preview'] = asset('storage/' . $service['image_preview']);
        $service['image_header'] = asset('storage/' . $service['image_header']);
        $service['image_content'] = json_decode($service['image_content']);
        $service['image_content'] = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $service['image_content']);

        $service['category_name'] = $service['category']['name'] ?? 'No Category';

        $service['created_at'] = Carbon::parse($service['created_at'])->format('d M Y, H:i');
        $service['updated_at'] = Carbon::parse($service['updated_at'])->format('d M Y, H:i');

        $ratings = $service['ratings'];
        $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
        $service['average_rating'] = $averageRating;

        $countRating = count($ratings);

        return view('service.show', compact('service', 'countRating'));
    }

    public function edit($uuid)
    {
        $service = Service::where('uuid', $uuid)->first();

        if (!$service) {
            return redirect()->route('service.index')->with('error', 'Service not found');
        }

        $service->content = html_entity_decode($service->content);

        $service->image_content = json_decode($service->image_content);
        $service->image_content = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $service->image_content);

        $service->image_preview = asset('storage/' . $service->image_preview);
        $service->image_header = asset('storage/' . $service->image_header);

        $category = Category::where('type', 'service')->get();

        return view('service.edit', compact('service', 'category'));
    }

    public function update(Request $request, $uuid)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:tbl_category,id',
            'image_preview' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_header' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_content.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()
                ->with('error_messages', $validate->errors()->all());
        }

        $service = Service::where('uuid', $uuid)->first();

        $imagePreview = $service->image_preview;
        if ($request->hasFile('image_preview')) {
            Storage::disk('public')->delete($service->image_preview);
            $imagePreview = $request->file('image_preview')->store('services', 'public');
        }

        $imageHeader = $service->image_header;
        if ($request->hasFile('image_header')) {
            Storage::disk('public')->delete($service->image_header);
            $imageHeader = $request->file('image_header')->store('services', 'public');
        }

        $imageContent = json_decode($service->image_content);
        if ($request->hasFile('image_content')) {
            foreach ($imageContent as $image) {
                Storage::disk('public')->delete($image);
            }

            $imageContent = [];
            foreach ($request->file('image_content') as $image) {
                $imageContent[] = $image->store('services', 'public');
            }
        }

        $service->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_publish' => $request->is_publish,
            'image_preview' => $imagePreview,
            'image_header' => $imageHeader,
            'image_content' => json_encode($imageContent),
        ]);

        return redirect()->route('service.index')->with('success', 'Service updated successfully');
    }

    public function changeStatus($id)
    {
        $service = Service::where('uuid', $id)->first();
        if ($service->is_publish === 1) {
            $service->update(['is_publish' => 0]);
        } else {
            $service->update(['is_publish' => 1]);
        }

        return redirect()->back()->with('success', 'Service status updated successfully');
    }

    public function destroy($id)
    {
        $service = Service::where('uuid', $id)->first();

        if (!$service) {
            return redirect()->route('service.index')->with('error', 'Service not found');
        }

        Storage::disk('public')->delete($service->image_preview);
        Storage::disk('public')->delete($service->image_header);
        foreach (json_decode($service->image_content) as $image) {
            Storage::disk('public')->delete($image);
        }

        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
