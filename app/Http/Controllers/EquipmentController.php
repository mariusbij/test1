<?php

namespace App\Http\Controllers;

use App\Services\EquipmentService\EquipmentService;
use App\Services\EquipmentService\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $equipmentService = new EquipmentService();
        $equipment = $equipmentService->filter($request);

        return view('app')
            ->with('equipment', $equipment)
            ->with('categories', $equipmentService->getAllCategories());
    }

    public function show(int $id)
    {
        $equipmentService = new EquipmentService();
        $equipment = $equipmentService->find($id);

        return view('single-equipment')
            ->with('equipment', $equipment);
    }
}
