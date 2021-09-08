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

    public function destroy(Package $package)
    {
        $package->delete();

        return response()->json(['status' => 'Package was deleted successfully.']);
    }
}
