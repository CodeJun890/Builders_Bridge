<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Rental;
use App\Models\SavedList;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // SUBMIT EMAIL CONTACT

    public function postMessage(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'message' => $request->message,
        ];

        try {
            Mail::to('buildersbridge3@gmail.com')->send(new ContactFormMail($data));
            return redirect()->back()->with('success', 'Thank you for reaching us out! Your message has been received.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an issue sending your message. Please try again later.');
        }
    }

    // DASHBOARD
    public function dashboard()
    {
        if(auth()->check()){
            $user = Auth::user();
            $savedListingCount = SavedList::where('user_id', $user->id)->count();
            $rentalCount = Rental::where('rental_owner', $user->id)->count();
            $serviceCount = Service::where('service_owner', $user->id)->count();
            return view('components.User.dashboard', compact('user', 'rentalCount','serviceCount', 'savedListingCount'));
        }
        return redirect()->route('login.get');
    }

    // MANAGE LISTINGS
    public function viewMyPosts()
    {
        if(auth()->check()){
            $user = Auth::user();
            $rentalItems = Rental::where('rental_owner', $user->id)->get();
            $serviceOffers = Service::where('service_owner', $user->id)->get();
            return view('components.User.myPosts', compact('user', 'rentalItems', 'serviceOffers'));
        }
        return redirect()->route('login.get');
    }

    public function fetchMyPostRent($id){
        if(auth()->check()){
            $decryptedId = decrypt($id);
            $user = Auth::user();
            $rental = Rental::findOrFail($decryptedId);
            return view('components.User.edit-post-rental', compact('user', 'rental'));
        }
        return redirect()->route('login.get');
    }

    public function updateMyRentPosts(Request $request, $id) {
        try {

            $user = Auth::user();

            // Validate the request data
            $validator = Validator::make($request->all(), [
                'rent_image_one' => 'nullable|image|max:5120',
                'rent_image_two' => 'nullable|image|max:5120',
                'rent_image_three' => 'nullable|image|max:5120',
                'rental_item_name' => 'required|string|max:255',
                'rental_status' => 'required|string|max:255',
                'engineeringTags' => 'required|array',
                'engineeringTags.*' => 'nullable|string|max:255',
                'rent_price_negotiable' => 'nullable|string|max:255',
                'rent_price' => 'nullable|string|max:255',
                'rental_description' => 'nullable|string',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Retrieve the existing Rental instance
            $rental = Rental::findOrFail($id);

            // Check if the authenticated user is the owner of the rental
            if ($rental->rental_owner != $user->id) {
                return redirect()->back()->with('error', 'Unauthorized action');
            }

            // Assign values from the request to the Rental instance
            $rental->rental_item_name = $request->input('rental_item_name');
            $rental->rental_status = $request->input('rental_status');
            $rental->tags = json_encode($request->input('engineeringTags'));
            $rental->rental_description = $request->input('rental_description');

            // Handle rent_price and rent_price_negotiable
            if ($request->has('rent_price_negotiable') && $request->input('rent_price_negotiable') === 'negotiable') {
                $rental->rent_price = 'negotiable';
            } else {
                $rental->rent_price = $request->input('rent_price');
            }

            // Delete existing images if new ones are uploaded
            if ($request->hasFile('rent_image_one')) {
                Storage::delete($rental->rent_image_one); // Delete old image
                $rental->rent_image_one = $request->file('rent_image_one')->store('rental_images', 'public');
            }
            if ($request->hasFile('rent_image_two')) {
                Storage::delete($rental->rent_image_two); // Delete old image
                $rental->rent_image_two = $request->file('rent_image_two')->store('rental_images', 'public');
            }
            if ($request->hasFile('rent_image_three')) {
                Storage::delete($rental->rent_image_three); // Delete old image
                $rental->rent_image_three = $request->file('rent_image_three')->store('rental_images', 'public');
            }

            // Save the updated Rental instance to the database
            $rental->save();

            return redirect()->back()->with('success', 'Rental updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the rental: ' . $e->getMessage());
        }
    }

    public function deleteRentPost($id){
        try {
            $decryptedId = decrypt($id);
            $toDeleteItem = Rental::findOrFail($decryptedId);

            if (!$toDeleteItem) {
                return redirect()->back()->with('error', 'Rental Item cannot be found');
            }

            // Delete the rental item images from storage
            if ($toDeleteItem->rent_image_one) {
                Storage::delete($toDeleteItem->rent_image_one);
            }
            if ($toDeleteItem->rent_image_two) {
                Storage::delete($toDeleteItem->rent_image_two);
            }
            if ($toDeleteItem->rent_image_three) {
                Storage::delete($toDeleteItem->rent_image_three);
            }

            // Delete the rental item record from the database
            $toDeleteItem->delete();

            return redirect()->back()->with('success', 'Rental Item has been deleted');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'An error occurred while deleting the rental item: ' . $e->getMessage());
        }
    }


    public function fetchMyPostService($id){
        if(auth()->check()){
            $decryptedId = decrypt($id);
            $user = Auth::user();
            $service = Service::findOrFail($decryptedId);
            return view('components.User.edit-post-service', compact('user', 'service'));
        }
        return redirect()->route('login.get');
    }

    public function updateMyServicePosts(Request $request, $id){
        try {

            $user = Auth::user();

            // Validate the request data
            $validator = Validator::make($request->all(), [
                'service_image_one' => 'nullable|image|max:5120',
                'service_image_two' => 'nullable|image|max:5120',
                'service_image_three' => 'nullable|image|max:5120',
                'service_title' => 'required|string|max:255',
                'service_status' => 'required|string|max:255',
                'category' => 'required|array', // Ensure category is an array
                'category.*' => 'string|max:255', // Each item in the array should be a string
                'service_price_negotiable' => 'nullable|string|max:255',
                'service_price' => 'nullable|string|max:255',
                'service_description' => 'nullable|string',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Retrieve the existing Service instance
            $service = Service::findOrFail($id);

            // Check if the authenticated user is the owner of the service
            if ($service->service_owner != $user->id) {
                return redirect()->back()->with('error', 'Unauthorized action');
            }

            // Assign values from the request to the Service instance
            $service->service_title = $request->input('service_title');
            $service->service_status = $request->input('service_status');

            // Convert categories to comma-separated string for storage
            $categories = $request->input('category');
            $categoryString = implode(',', $categories); // Convert array to comma-separated string
            $service->category = $categoryString;

            // Handle service price based on negotiability
            if ($request->input('service_price_negotiable') === 'negotiable') {
                $service->service_price = 'negotiable';
            } else {
                $service->service_price = $request->input('service_price');
            }

            $service->service_description = $request->input('service_description');

            // Upload and update the images
            if ($request->hasFile('service_image_one')) {
                Storage::delete($service->service_image_one); // Delete old image
                $service->service_image_one = $request->file('service_image_one')->store('service_images', 'public');
            }
            if ($request->hasFile('service_image_two')) {
                Storage::delete($service->service_image_two); // Delete old image
                $service->service_image_two = $request->file('service_image_two')->store('service_images', 'public');
            }
            if ($request->hasFile('service_image_three')) {
                Storage::delete($service->service_image_three); // Delete old image
                $service->service_image_three = $request->file('service_image_three')->store('service_images', 'public');
            }

            // Save the updated Service instance to the database
            $service->save();

            return redirect()->back()->with('success', 'Service updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the service: ' . $e->getMessage());
        }
    }
    public function deleteServicePost($id){
        try {
            $decryptedId = decrypt($id);
            $toDeleteService = Service::findOrFail($decryptedId);

            if (!$toDeleteService) {
                return redirect()->back()->with('error', 'Service Offer cannot be found');
            }

            // Delete the service images from storage
            if ($toDeleteService->service_image_one) {
                Storage::delete($toDeleteService->service_image_one);
            }
            if ($toDeleteService->service_image_two) {
                Storage::delete($toDeleteService->service_image_two);
            }
            if ($toDeleteService->service_image_three) {
                Storage::delete($toDeleteService->service_image_three);
            }

            // Delete the service record from the database
            $toDeleteService->delete();

            return redirect()->back()->with('success', 'Service Offer has been deleted');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'An error occurred while deleting the service offer: ' . $e->getMessage());
        }
    }


    // RENTALS

    public function rentals()   {
        if(auth()->check()){
            $user = Auth::user();
            $users = User::all();
            $rentals = Rental::with('ownerRental')->orderBy('created_at', 'desc')->get();
            return view('components.User.rental', compact('user','users', 'rentals'));
        }
        return redirect()->route('login.get');
    }


    public function viewRental($id)
    {
        if(auth()->check()){
            $user = Auth::user();
            $decryptedId = decrypt($id);
            $rentalItem = Rental::findOrFail($decryptedId);
            return view('components.User.view-rental', compact('user', 'rentalItem'));
        }
        return redirect()->route('login.get');
    }

    public function viewProfile($id)
    {
        if (auth()->check()) {
            $user = Auth::user();
            $decryptedId = decrypt($id);
            $rentalOwner = User::findOrFail($decryptedId);
            $rentalItems = Rental::where('rental_owner', $decryptedId)->get();
            $serviceOffers = Service::where('service_owner', $decryptedId)->get();
            $workData = json_decode($rentalOwner->work_experience, true);
            $educationData = json_decode($rentalOwner->education, true);
            $certificateData = json_decode($rentalOwner->certifications, true);
            $addressData = json_decode($rentalOwner->addresses, true);

            return view('components.User.view-profile', compact('user', 'rentalItems','serviceOffers', 'rentalOwner', 'educationData', 'workData','addressData', 'certificateData'));
        }

        return redirect()->route('login.get');
    }

    public function publishRental()
    {
        if(auth()->check()){
            $user = Auth::user();
            return view('components.User.post-rental', compact('user'));
        }
        return redirect()->route('login.get');
    }

    public function postRental(Request $request){
        try {
            $user = Auth::user();

            // Validate the request data
            $validator = Validator::make($request->all(), [
                'rent_image_one' => 'nullable|image|max:5120',
                'rent_image_two' => 'nullable|image|max:5120',
                'rent_image_three' => 'nullable|image|max:5120',
                'rental_item_name' => 'required|string|max:255',
                'rental_status' => 'required|string|max:255',
                'engineeringTags' => 'required|array', // Ensure engineeringTags is an array
                'engineeringTags.*' => 'nullable|string|max:255', // Assuming tags are strings
                'rent_price_negotiable' => 'nullable|string|max:255',
                'rent_price' => 'nullable|string|max:255',
                'rental_description' => 'nullable|string',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Create a new Rental instance
            $rental = new Rental();

            // Assign values from the request to the Rental instance
            $rental->rental_owner = $user->id;
            $rental->rental_item_name = $request->input('rental_item_name');
            $rental->rental_status = $request->input('rental_status');
            $rental->tags = json_encode($request->input('engineeringTags'));
            $rental->rental_description = $request->input('rental_description');

            // Check if rent_price_negotiable or rent_price has value and set rent_price accordingly
            if ($request->has('rent_price_negotiable') && $request->input('rent_price_negotiable') === 'negotiable') {
                $rental->rent_price = 'negotiable';
            } else {
                $rental->rent_price = $request->input('rent_price');
            }

            // Upload and store the images
            if ($request->hasFile('rent_image_one')) {
                $rental->rent_image_one = $request->file('rent_image_one')->store('rental_images', 'public');
            }
            if ($request->hasFile('rent_image_two')) {
                $rental->rent_image_two = $request->file('rent_image_two')->store('rental_images', 'public');
            }
            if ($request->hasFile('rent_image_three')) {
                $rental->rent_image_three = $request->file('rent_image_three')->store('rental_images', 'public');
            }



            // Save the Rental instance to the database
            $rental->save();

            // Optionally, you can return a response indicating success or redirect to a different page
            return redirect()->back()->with('success', 'Rental created successfully');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'An error occurred while creating the rental: ' . $e->getMessage());
        }
    }



    // SERVICES

    public function services()
    {
        if(auth()->check()){
            $user = Auth::user();
            $users = User::all();
            $services = Service::with('ownerService')->orderBy('created_at', 'desc')->get();
            return view('components.User.service', compact('user', 'users', 'services'));
        }
        return redirect()->route('login.get');
    }

    public function viewService($id)
    {
        if(auth()->check()){
            $user = Auth::user();
            $decryptedId = decrypt($id);
            $serviceOffer = Service::findOrFail($decryptedId);
            return view('components.User.view-service', compact('user', 'serviceOffer'));
        }
        return redirect()->route('login.get');
    }

    public function publishService()
    {
        if(auth()->check()){
            $user = Auth::user();
            return view('components.User.post-service', compact('user'));
        }
        return redirect()->route('login.get');
    }

    public function postService(Request $request){
    try {
        $user = Auth::user();

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'service_image_one' => 'nullable|image|max:5120',
            'service_image_two' => 'nullable|image|max:5120',
            'service_image_three' => 'nullable|image|max:5120',
            'service_title' => 'required|string|max:255',
            'service_status' => 'required|string|max:255',
            'category' => 'required|array', // Ensure category is an array
            'category.*' => 'string|max:255', // Each item in the array should be a string
            'service_price_negotiable' => 'nullable|string|max:255',
            'service_price' => 'nullable|string|max:255',
            'service_description' => 'nullable|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new Rental instance
        $service = new Service();

        // Assign values from the request to the Rental instance
        $service->service_owner = $user->id;
        $service->service_title = $request->input('service_title');
        $service->service_status = $request->input('service_status');

        // Convert categories to comma-separated string for storage
        $categories = $request->input('category');
        $categoryString = implode(',', $categories); // Convert array to comma-separated string
        $service->category = $categoryString;

        // Handle service price based on negotiability
        if ($request->input('service_price_negotiable') === 'negotiable') {
            $service->service_price = 'negotiable';
        } else {
            $service->service_price = $request->input('service_price');
        }

        $service->service_description = $request->input('service_description');

        // Upload and store the images
        if ($request->hasFile('service_image_one')) {
            $service->service_image_one = $request->file('service_image_one')->store('service_images', 'public');
        }
        if ($request->hasFile('service_image_two')) {
            $service->service_image_two = $request->file('service_image_two')->store('service_images', 'public');
        }
        if ($request->hasFile('service_image_three')) {
            $service->service_image_three = $request->file('service_image_three')->store('service_images', 'public');
        }

        // Save the Rental instance to the database
        $service->save();

        // Optionally, you can return a response indicating success or redirect to a different page
        return redirect()->back()->with('success', 'Service created successfully');
    } catch (\Exception $e) {
        // Handle the exception
        return redirect()->back()->with('error', 'An error occurred while creating the service: ' . $e->getMessage());
    }
}



    // ACCOUNT SETTINGS

    public function profile()
    {
        if(auth()->check()){
            $user = Auth::user();
            $certificateData = json_decode($user->certifications, true);
            $workData = json_decode($user->work_experience, true);
            $educationData = json_decode($user->education, true);
            return view('components.User.profile', compact('user','certificateData','workData','educationData'));
        }
        return redirect()->route('login.get');
    }

    public function profileUpdate(Request $request){
        $user = Auth::user();
        if ($request->info_type === "personal") {
            // Validation rules for personal information
            $validatedData = $request->validate([
                'firstname' => 'nullable',
                'middlename' => 'nullable',
                'lastname' => 'nullable',
                'gender' => 'nullable',
                'birthday' => 'nullable',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            ]);

            // Update personal information
            // Handle profile image upload if provided
            if ($request->hasFile('profile')) {
                // Delete the existing profile image
                if ($user->profile) {
                    Storage::disk('public')->delete($user->profile);
                }
                // Upload new profile image
                $imagePath = $request->file('profile')->store('profiles', 'public');
                $validatedData['profile'] = $imagePath;
            }

            $user->update($validatedData);
            return redirect()->back()->with('success', 'Personal information updated successfully');
        } elseif ($request->info_type === "contact") {
            // Validation rules for contact and social link information
            $validatedData = $request->validate([
                'email' => 'nullable|email|unique:users,email,' . $user->id,
                'phoneNumber' => 'nullable',
                'fb_link' => 'nullable',
                'ig_link' => 'nullable',
            ]);

            // Check and update email if changed
            if ($request->email !== $user->email) {
                $uniqueEmailRule = 'unique:users,email,' . $user->id;
                $emailValidation = Validator::make(['email' => $request->email], ['email' => $uniqueEmailRule]);
                if ($emailValidation->fails()) {
                    return redirect()->route('profile.get')->with('error', 'The provided email already exists.');
                }
            }

            // Update user model
            $user->email = $request->email ?? $user->email; // Only update if provided
            $user->phoneNumber = $request->phoneNumber ?? $user->phoneNumber; // Only update if provided
            $user->social_links = json_encode([
                'fb_link' => $request->fb_link ?? null,
                'ig_link' => $request->ig_link ?? null,
            ]);

            // Save changes to the user model
            $user->save();

            return redirect()->back()->with('success', 'Contact information updated successfully');
        } elseif ($request->info_type === "address") {
            // Validation rules for address information
            $validatedData = $request->validate([
                'region' => 'nullable',
                'province' => 'nullable',
                'city' => 'nullable',
                'barangay' => 'nullable',
                'street_address' => 'nullable',
            ]);

            // Update address information
            $user->addresses = json_encode($validatedData); // Store address data as JSON
            $user->save();

            return redirect()->back()->with('success', 'Address information updated successfully');
        } elseif ($request->info_type === "professional") {
            // Validation rules for education, work, certificates, and about introduction

            $validatedDataAbout = $request->validate([
                'about' => 'nullable',
            ]);


            $user->about = $validatedDataAbout['about'];

            $validatedDataCurrentWork = $request->validate([
                'current_job_title' => 'nullable|string',
                'current_company_name' => 'nullable|string',
            ]);

            $validatedDataWork = $request->validate([
                'job_title.*' => 'nullable|string',
                'company_name.*' => 'nullable|string',
                'years_experience.*' => 'nullable|string',
            ]);

            $validatedDataEducation = $request->validate([
                'degree.*' => 'nullable|string',
                'major.*' => 'nullable|string',
                'school.*' => 'nullable|string',
                'graduation_year.*' => 'nullable|date_format:Y',
            ]);

            $validatedDataCertificate = $request->validate([
                'certificate_name_1' => 'nullable|string',
                'certificate_file_1' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:10240',
                'certificate_name_2' => 'nullable|string',
                'certificate_file_2' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:10240',
                'certificate_name_3' => 'nullable|string',
                'certificate_file_3' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:10240',
            ]);

            // Handle file upload and storage for certificates
            $certificateFiles = [];
            $originalNames = [];
            $existingCertifications = json_decode($user->certifications, true) ?? [];

            for ($i = 1; $i <= 3; $i++) {
                $certificateNameKey = "certificate_name_$i";
                $certificateFileKey = "certificate_file_$i";
                $deleteCertificateKey = "delete_certificate_file_$i";

                if ($request->input($deleteCertificateKey) == '1') {
                    // Delete the existing file if it exists and user requested deletion
                    if (!empty($existingCertifications["certificate_file_$i"])) {
                        Storage::disk('public')->delete($existingCertifications["certificate_file_$i"]);
                    }
                    $certificateFiles[$i] = null;
                    $originalNames[$i] = null;
                } elseif ($request->hasFile($certificateFileKey)) {
                    // Delete the existing file if a new file is uploaded
                    if (!empty($existingCertifications["certificate_file_$i"])) {
                        Storage::disk('public')->delete($existingCertifications["certificate_file_$i"]);
                    }

                    // Store the new file
                    $certificateFiles[$i] = $request->file($certificateFileKey)->store('certificates', 'public');
                    $originalNames[$i] = $request->file($certificateFileKey)->getClientOriginalName();
                } else {
                    // Keep the existing file if no new file is uploaded and no deletion is requested
                    $certificateFiles[$i] = $existingCertifications["certificate_file_$i"] ?? null;
                    $originalNames[$i] = $existingCertifications["original_name_$i"] ?? null;
                }
            }

            // Save the data to the user model
            $user->current_company_name = $validatedDataCurrentWork['current_company_name'];
            $user->current_job_title = $validatedDataCurrentWork['current_job_title'];
            $user->work_experience = json_encode($validatedDataWork);
            $user->education = json_encode($validatedDataEducation);
            $user->certifications = json_encode([
                'certificate_name_1' => $validatedDataCertificate['certificate_name_1'] ?? null,
                'certificate_file_1' => $certificateFiles[1],
                'original_name_1' => $originalNames[1],
                'certificate_name_2' => $validatedDataCertificate['certificate_name_2'] ?? null,
                'certificate_file_2' => $certificateFiles[2],
                'original_name_2' => $originalNames[2],
                'certificate_name_3' => $validatedDataCertificate['certificate_name_3'] ?? null,
                'certificate_file_3' => $certificateFiles[3],
                'original_name_3' => $originalNames[3],
            ]);
            $user->save();

            return redirect()->back()->with('success', 'Professional information updated successfully');
        }else {
            return redirect()->back()->with('error', 'Failed to update the information');
        }
    }

    // CHANGE PASSWORD

    public function changePassword()
    {
        if(auth()->check()){
            $user = Auth::user();
            return view('components.User.change-password', compact('user'));
        }
        return redirect()->route('login.get');
    }
    public function changePasswordUpdate(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
        ], [
            'new_password.min' => 'The new password must be at least 6 characters long.',
        ]);

        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return redirect()->back()->with('error', 'The old password is incorrect.');
        }

        // Encrypt the new password
        $newPassword = bcrypt($validatedData['new_password']);
        $user->update(['password' => $newPassword]);

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

}
