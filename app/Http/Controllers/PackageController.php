<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Package;

class PackageController extends Controller
{
    protected function calculatePackages()
    {

    }

    public function index()
    {
        $packages = Package::orderBy('size', 'ASC')->get();

        return view('packages.index', compact('packages'));
    }

    public function store()
    {
        $this->validate(request(), [ 'size' => 'required|numeric|gt:0' ]);

        $package = Package::create(request()->except('_token'));

        return response()->json($package);
    }

    public function update(Package $package)
    {
        $this->validate(request(), [ 'size' => 'required|numeric|gt:0' ]);

        $package->update(request()->except('_token'));

        return response()->json($package);
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return response()->json(['status' => 'Package was deleted successfully.']);
    }
}
