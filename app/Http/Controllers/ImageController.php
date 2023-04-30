<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        return Image::all();
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

    public function show(Image $image)
    {
        return $image;
    }

    public function update(UpdateImageRequest $request, Image $image): RedirectResponse
    {
        $image->update($request->validated());

        return $image;
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return response()->json();
    }
}
