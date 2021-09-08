<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Package;

class PackageController extends Controller
{
    public function result(int $orderSize)
    {
        $remainingOrder = $orderSize;
        $packages = Package::orderBy('size')->pluck('size')->toArray();
        $packageCount = count($packages) - 1;

        $numberPackagesPerSize = [];

        while($remainingOrder > 0 && $packageCount > -1)
        {
            if ($packages[$packageCount] > $remainingOrder) 
            {
                $packageCount--;
                continue;
            }

            if (!isset($numberPackagesPerSize[$packages[$packageCount]]))
            {
                $numberPackagesPerSize[$packages[$packageCount]] = 0;
            }
            $numberPackagesPerSize[$packages[$packageCount]] = $numberPackagesPerSize[$packages[$packageCount]] + 1;

            $remainingOrder -= $packages[$packageCount];

            $packageCount--;
        }

        return response()->json(['result' => $numberPackagesPerSize]);
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
