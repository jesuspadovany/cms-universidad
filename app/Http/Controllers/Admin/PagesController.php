<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePageImageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Page;

class PagesController extends Controller
{
    public function show(Page $page)
    {
        return view('admin.pages.show', [
            'page' => $page
        ]);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'page' => $page
        ]);
    }

    public function update(UpdatePageRequest $updatePageRequest, Page $page)
    {
        $page->update($updatePageRequest->validated());

        return redirect()->route('admin.pages.show', ['page' => $page->slug])->with('alert', [
            'type' => 'success',
            'message' => 'La página ha sido editada con éxito.'
        ]);
    }

    public function editImage(Page $page)
    {
        return view('admin.pages.edit-image', [
            'page' => $page
        ]);
    }

    public function updateImage(UpdatePageImageRequest $updatePageRequest, Page $page)
    {
        $page->update($updatePageRequest->validated());

        return redirect()->route('admin.pages.show', ['page' => $page->slug])->with('alert', [
            'type' => 'success',
            'message' => 'La imagen de la página ha sido cambiada con éxito.'
        ]);
    }
}
