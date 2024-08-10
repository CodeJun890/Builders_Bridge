<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\SavedList;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedListController extends Controller
{
    //
    public function viewSavedListings(Request $request){
        if(auth()->check()){
            $user = Auth::user();

            // Fetch the saved list entries for the authenticated user
            $savedLists = SavedList::where('user_id', $user->id)->get();

            // Collect all rental and service IDs
            $rentalIds = $savedLists->whereNotNull('rental_id')->pluck('rental_id')->toArray();
            $serviceIds = $savedLists->whereNotNull('service_id')->pluck('service_id')->toArray();

            // Retrieve the respective models
            $rentalItems = Rental::whereIn('id', $rentalIds)->get();
            $serviceOffers = Service::whereIn('id', $serviceIds)->get();

            // Pass the data to the view
            return view('components.User.saved-list', compact('user', 'rentalItems', 'serviceOffers'));
        }
        return redirect()->route('login.get');
    }

    //
    public function addToWishlist(Request $request){
        $user = Auth::user();
        $rentalId = $request->input('rental_id');
        $serviceId = $request->input('service_id');

        $savedList = new SavedList();
        $savedList->user_id = $user->id;
        $savedList->rental_id = $rentalId;
        $savedList->service_id = $serviceId;
        $savedList->save();

        return redirect()->back()->with('success', 'Item added to saved lists');
    }
    public function removeFromWishlist($id){
        $savedList = SavedList::find($id);

        if ($savedList && $savedList->user_id == Auth::id()) {
            $savedList->delete();
            return redirect()->back()->with('success', 'Item removed from saved lists');
        }

        return redirect()->back()->with('error', 'An error occurred');
    }

    public function toggleWishlist(Request $request){
        $user = Auth::user();
        $rentalId = $request->input('rental_id');
        $serviceId = $request->input('service_id');

        // Check if the item is a rental or service
        $savedList = SavedList::where('user_id', $user->id)
            ->when($rentalId, function ($query, $rentalId) {
                return $query->where('rental_id', $rentalId);
            })
            ->when($serviceId, function ($query, $serviceId) {
                return $query->where('service_id', $serviceId);
            })
            ->first();

        if ($savedList) {
            $savedList->delete();
            return redirect()->back()->with('success', 'Item removed from wishlist');
        } else {
            $newSavedList = new SavedList();
            $newSavedList->user_id = $user->id;
            if ($rentalId) {
                $newSavedList->rental_id = $rentalId;
            }
            if ($serviceId) {
                $newSavedList->service_id = $serviceId;
            }
            $newSavedList->save();
            return redirect()->back()->with('success', 'Item added to wishlist');
        }
    }

}
