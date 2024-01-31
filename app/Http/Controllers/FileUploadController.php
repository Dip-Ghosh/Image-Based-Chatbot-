<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidationRequest;
use App\Services\ChatGptApiService;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class FileUploadController extends Controller
{

    public function __construct(private readonly ChatGptApiService $chatGptService)
    {

    }

    public function create()
    {
        return view('image-upload.create');
    }

    public function uploadImage(ImageValidationRequest $request)
    {
        $file      = $request->file('file');
        $imageName = time() . '.' . $file->hashName();
        $file->move(public_path('images'), $imageName);

//        //resize image
//        $imgFile = Image::make($file);
//        $imgFile->resize(150, 150, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save(public_path('uploads'), $imageName);
//
        $message = $this->chatGptService->generateResponseFromImage($imageName);
//        dd($message);
        return back()
            ->with('success', 'Image has successfully uploaded.')
            ->with('fileName', $imageName);

    }


}
