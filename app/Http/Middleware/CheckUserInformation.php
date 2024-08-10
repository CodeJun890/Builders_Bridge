<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserInformation
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            // If not authenticated, redirect to login page
            return redirect()->route('login.get');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if required fields are filled
        $requiredFields = ['email', 'password', 'firstname', 'lastname', 'gender'];

        foreach ($requiredFields as $field) {
            if (empty($user->$field)) {
                session()->flash('info', "Please complete your personal information ({$field}) before proceeding.");
            }
        }


        // Check if addresses are filled
        $addressFields = ['region', 'province', 'city', 'barangay'];

        foreach ($addressFields as $addressField) {
            $addressData = json_decode($user->addresses, true);
            if (empty($addressData[$addressField])) {
                session()->flash('info', "Please complete your address information for {$addressField} before proceeding.");
            }
        }

        // Check if social links are filled
        $socialLinks = ['fb_link'];

        foreach ($socialLinks as $socialLinkField) {
            $socialLinkData = json_decode($user->social_links, true);
            if (empty($socialLinkData[$socialLinkField])) {
                session()->flash('info', "Please provide a social link so that customers can contact you regarding your rentals and services.");
            }
        }


        // Check if about information is filled
        if (empty($user->about)) {
            session()->flash('info', "Please complete your 'About' information before proceeding.");
        }



        // If all checks pass, continue with the request
        return $next($request);
    }
}
