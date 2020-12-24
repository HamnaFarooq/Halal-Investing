<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\User;
use DateTime;

class mailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registered()
    {
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('to' => $to_name);
        Mail::send('emails.registered', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Registered');
            $message->from('F2016065099@umt.edu.pk', 'Halal Investings');
        });
        return redirect("/home");
    }

    public function report_requested($company_name)
    {
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('to' => $to_name, 'company_name' => $company_name);
        Mail::send('emails.requestresearch', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Request Recieved');
            $message->from('F2016065099@umt.edu.pk', 'Halal Investings');
        });
    }

    public function portfolio_subscribed($expiry)
    {
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('to' => $to_name, 'service' => 'Portfolio', 'expiry' => $expiry->format('Y-m-d') );
        Mail::send('emails.subscribed', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Subscribed to Portfolio');
            $message->from('F2016065099@umt.edu.pk', 'Halal Investings');
        });
    }

    public function reports_subscribed($expiry)
    {
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('to' => $to_name, 'service' => 'Reasearch Reports', 'expiry' => $expiry->format('Y-m-d') );
        Mail::send('emails.subscribed', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Subscribed to Research Reports');
            $message->from('F2016065099@umt.edu.pk', 'Halal Investings');
        });
    }

    public function portfolioupdate($company_name, $share_percentage, $action, $share_price)
    {
        $users = User::where('id', '!=', Auth::id())->get();
        foreach ($users as $user) {
            $to_name = $user->name;
            $to_email = $user->email;
            $data = array('to' => $to_name, 'company_name' => $company_name, 'share_percentage' => $share_percentage, 'action' => $action, 'share_price' => $share_price);
            Mail::send('emails.portfolioupdate', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Addition to Portfolio');
                $message->from('F2016065099@umt.edu.pk', 'Halal Investings');
            });
        }
    }

    public function notifyexpiring()
    {
        $users = User::where('user_type', '!=', 'admin')->get();
        foreach ($users as $user) {
            $week = new DateTime(today()->addDays(8));

            //for portfolio
            $expiry = new DateTime($user->portfolio_ends_at);
            if ($expiry < today()) {
                $user->update(['portfolio' => 'not_subscribed']);
                $user->save();
            }
            $result = $expiry > today() && $expiry < $week;
            if ($result) {
                $to_name = $user->name;
                $to_email = $user->email;
                $data = array('to' => $to_name, 'expiry' => $user->portfolio_ends_at, 'service' => 'Portfolio', 'link' => 'subscribe_to_portfolio_again');
                Mail::send('emails.expirynotification', $data, function ($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)->subject('Portfolio Subscription expiring soon!');
                    $message->from('F2016065099@umt.edu.pk', 'Halal Investings');
                });
            }

            // for reports 
            $expiry = new DateTime($user->reports_ends_at);
            if ($expiry < today()) {
                $user->update(['reports' => 'not_subscribed']);
                $user->save();
            }
            $result = $expiry > today() && $expiry < $week;
            if ($result) {
                $to_name = $user->name;
                $to_email = $user->email;
                $data = array('to' => $to_name, 'expiry' => $user->reports_ends_at, 'service' => 'Research Reports', 'link' => 'subscribe_to_reports_again');
                Mail::send('emails.expirynotification', $data, function ($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)->subject('Research Reports Subscription expiring soon!');
                    $message->from('F2016065099@umt.edu.pk', 'Halal Investings');
                });
            }
            return redirect('/admin')->with('success', 'Emails sent.');
        }
        return redirect('/admin')->with('errormsg', 'Could not get users from database.');
    }
}
