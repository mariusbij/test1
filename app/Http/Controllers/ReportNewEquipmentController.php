<?php

namespace App\Http\Controllers;

use App\Services\EquipmentService\EquipmentService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportNewEquipmentController extends Controller
{
    public function index(): Factory|View|Application
    {
        $equipmentService = new EquipmentService();

        return view('report-new-equipment')
            ->with('categories', $equipmentService->getAllCategories())
            ->with('tags', $equipmentService->getAllTags());
    }

    public function store(Request $request): RedirectResponse
    {
        $service = new EquipmentService();
        $success = $service->store($request);
        return redirect()->route('reportNewPage')->with('success', $success);
    }
}
