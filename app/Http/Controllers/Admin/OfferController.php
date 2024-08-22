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

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'enddate' => 'string|max:255',
    //     ]);

    //     $offer = Offer::create([
    //         'title' => $request->title,
    //         'enddate' => $request->enddate
    //     ]);

    //     if ($offer) {
    //         return redirect()->route('admin.offers.index')->with('success', __('Successfully Stored!'));
    //     }
    //     return redirect()->back()->with('error', __('Failed to Store!'));
    // }

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

public function update(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'offerbanner' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
    ]);

    $id = $request->id;
    $offer = Offer::findOrFail($id);
    $bannerPath = $offer->offerbanner;

    if ($request->hasFile('offerbanner')) {
        // Optionally delete the old banner if it exists
        if ($bannerPath) {
            Storage::disk('public')->delete($bannerPath);
        }

        // Store the new banner
        $bannerPath = $request->file('offerbanner')->store('banners', 'public');
    }

    $offer->update([
        'title' => $request->title,
        'enddate' => $request->enddate,
        'offerbanner' => $bannerPath,
    ]);

    if ($offer) {
        return redirect()->route('admin.offers.index')->with('success', __('Successfully Updated!'));
    }
    return redirect()->back()->with('error', __('Failed to Update!'));
}



    // public function edit($id)
    // {
    //     $data['title'] = __('Edit Offer');
    //     $data['edit'] = Offer::findOrFail($id);
    //     return view('admin.pages.offers.edit', $data);
    // }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255'
    //     ]);

    //     $id = $request->id;
    //     $offer = Offer::where('id', $id)->update([
    //         'title' => $request->title,
    //         'enddate' => $request->enddate
    //     ]);

    //     if ($offer) {
    //         return redirect()->route('admin.offers.index')->with('success', __('Successfully Updated!'));
    //     }
    //     return redirect()->back()->with('error', __('Failed to Update!'));
    // }

    // public function destroy($id)
    // {
    //     $offer = Offer::findOrFail($id);
    //     $offer->delete();

    //     return redirect()->route('admin.offers.index')->with('success', __('Successfully Deleted!'));
    // }
}
