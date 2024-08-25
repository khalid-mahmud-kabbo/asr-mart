<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Admin\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        try {
            $data = Offer::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="action__buttons">';
                    $btn = $btn . '<a href="'.route('admin.offers.edit', $row->id).'" class="btn-action"><i class="fas fa-pen-to-square"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;


                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    $offers = Offer::latest()->get();
    return view('admin.pages.offers.index');
}


    public function create()
    {
        $data['title'] = __('Create Offer');
        return view('admin.pages.offers.create', $data);
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'enddate' => 'string|max:255',
        'offerbanner' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
    ]);

    $bannerPath = null;
    if ($request->hasFile('offerbanner')) {
        $bannerPath = $request->file('offerbanner')->store('banners', 'public'); // Save image to 'public/banners'
    }

    $offer = Offer::create([
        'title' => $request->title,
        'enddate' => $request->enddate,
        'offerbanner' => $bannerPath,
    ]);

    if ($offer) {
        return redirect()->route('admin.offers.index')->with('success', __('Successfully Stored!'));
    }
    return redirect()->back()->with('error', __('Failed to Store!'));
}



public function edit($id)
{
    $data['title'] = __('Edit Offer');
    $data['edit'] = Offer::findOrFail($id);
    return view('admin.pages.offers.edit', $data);
}

// public function update(Request $request)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'offerbanner' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
//     ]);

//     $id = $request->id;
//     $offer = Offer::findOrFail($id);
//     $bannerPath = $offer->offerbanner;

//         if ($request->hasFile('offerbanner')) {
//             $bannerPath = $request->file('offerbanner')->store('banners', 'public'); // Save image to 'public/banners'
//         }

//     $offer->update([
//         'title' => $request->title,
//         'enddate' => $request->enddate,
//         'offerbanner' => $bannerPath,
//     ]);

//     if ($offer) {
//         return redirect()->route('admin.offers.index')->with('success', __('Successfully Updated!'));
//     }
//     return redirect()->back()->with('error', __('Failed to Update!'));
// }

public function update(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'offerbanner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        'enddate' => 'nullable|date', // Assuming enddate is optional and should be validated if present
    ]);

    // Find the offer by ID
    $id = $request->id;
    $offer = Offer::findOrFail($id);

    // Handle image upload if a new image is provided
    if ($request->hasFile('offerbanner')) {
        // Get the old image path
        $oldImage = $offer->offerbanner;

        // Upload the new image and get the new path
        $bannerPath = $request->file('offerbanner')->store('upload_files/offerbanner', 'public');

        // Optionally delete the old image file
        if ($oldImage && Storage::disk('public')->exists($oldImage)) {
            Storage::disk('public')->delete($oldImage);
        }
    } else {
        // If no new image is uploaded, keep the old path
        $bannerPath = $offer->offerbanner;
    }

    // Update the offer with new values
    $offer->update([
        'title' => $request->title,
        'enddate' => $request->enddate,
        'offerbanner' => $bannerPath,
    ]);

    // Redirect with success message
    return redirect()->route('admin.offers.index')->with('success', __('Successfully Updated!'));
}


}
