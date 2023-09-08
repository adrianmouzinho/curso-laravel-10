<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        return view('admin.supports.index', compact('supports'));
    }

    public function show(string $id)
    {
        $support = Support::find($id);

        if (!$support) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupportRequest $request, Support $suport)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $suport->create($data);

        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
        $support = Support::find($id);

        if (!$support) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, string $id)
    {
        $support = Support::find($id);

        if (!$support) {
            return back();
        }

        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        $support = Support::find($id);

        if (!$support) {
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }
}
