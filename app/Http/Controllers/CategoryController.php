<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Contracts\CategoryReadRepositoryInterface;
use App\Repositories\Contracts\CategoryWriteRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    protected CategoryReadRepositoryInterface $categoryReadRepositoryInterface;

    protected CategoryWriteRepositoryInterface $categoryWriteRepositoryInterface;

    /**
     * @param CategoryReadRepositoryInterface $categoryReadRepositoryInterface
     * @param CategoryWriteRepositoryInterface $categoryWriteRepositoryInterface
     */
    public function __construct(CategoryReadRepositoryInterface $categoryReadRepositoryInterface, CategoryWriteRepositoryInterface $categoryWriteRepositoryInterface)
    {
        $this->categoryReadRepositoryInterface = $categoryReadRepositoryInterface;
        $this->categoryWriteRepositoryInterface = $categoryWriteRepositoryInterface;
    }

    public function index(): View
    {
        return view('category.index', [
            'categories' => $this->categoryReadRepositoryInterface->getCategories(),
        ]);
    }

    public function update(CategoryUpdateRequest $request): RedirectResponse
    {
        $this->categoryWriteRepositoryInterface->updateCategories($request->validated());

        return back();
    }
}
