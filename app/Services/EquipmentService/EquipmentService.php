<?php

namespace App\Services\EquipmentService;

use App\Services\EquipmentService\Models\Category;
use App\Services\EquipmentService\Models\Equipment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class EquipmentService
{
    public function filter(Request $request)
    {
        return Equipment::filter($request)
            ->orderBy('date', 'DESC')
            ->paginate(15)
            ->withQueryString();
    }

    public function find(int $id)
    {
        return Equipment::findOrFail($id);
    }

    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function getAllTags(): Collection
    {
        return Tag::all();
    }

    public function store(Request $request): bool
    {
        $this->validate($request);

        $equipment = new Equipment();
        $equipment->name = $request->input('name');
        $equipment->side_country = $request->input('side_country');
        $equipment->category_id = $request->input('category_id');
        $equipment->date = $request->input('date');
        $equipment->source_url = $request->input('source_url');
        $equipment->approved = false;

        $success = $equipment->save();

        if ($success) {
            $equipment->attachTags($request->input('tags'));
        }
        return $success;
    }

    private function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|max:255',
            'side_country' => 'required',
            'category_id' => 'required',
            'date' => 'required|date',
            'source_url' => 'required|url',
            'tags' => 'required'
        ]);
    }
}
