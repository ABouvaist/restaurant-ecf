<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ImageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Gallery', [
            'images' => Image::all(),
        ]);
    }

    public function store(StoreImageRequest $request): void
    {
        $title = $request->validated('title');
        $image = $request->file('image');
        $imageName = sprintf("%s-%s.%s", $title, time(), $image->extension());
        $path = $image->storeAs('images', $imageName);


        Image::create([
            'title' => $title,
            'url' => $path,
            'shown' => true,
        ]);
    }

    public function show(Image $image): Response
    {
        return Inertia::render('Admin/Image', [
            'image' => $image,
        ]);
    }

    public function update(UpdateImageRequest $request, Image $image): RedirectResponse
    {
        $image->update($request->validated());

        return to_route('images.index');
    }

    public function destroy(Image $image): RedirectResponse
    {
        $image->delete();

        return to_route('images.index');
    }
}
