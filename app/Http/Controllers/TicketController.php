<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Notifications\ticket_entry;
use App\Notifications\ticketAdressed;
use App\Notifications\ticketEntry;
use Illuminate\Http\Request;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;



class TicketController extends Controller
{

    public function ticket(){
        return view('auth.ticket');
    }
    public function dash(){
        if(Auth::user()->type == 'user') {
            $tickets = DB::table('tickets')->where('user_id', Auth::user()->id)->get();
            return view('dashboard', ['tickets' => $tickets]);
        }
        elseif(Auth::user()->type == 'admin') {
            $tickets = Ticket::whereNull('ticket_reply')->get();
            return view('admindashboard', ['tickets' => $tickets]);
        }
    }
    public function admindash(){
        $tickets = Ticket::whereNull('ticket_reply')->get();
        return view('admindashboard', ['tickets' => $tickets]);
    }
    public function ticket_entry(Request $request){
        $request->validate([
            'user_id' => ['required|numeric'],
            'ticket_type' => ['required'],
            'ticket_description' => ['required'],

        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::user()->id,
            'ticket_type' => $request->ticket_type,
            'ticket_description' => $request->ticket_description,
        ]);
        $admin = User::where('type', "admin")->get();
        Notification::send($admin, new ticketEntry);

        return redirect(route('dashboard'));


    }
    public function replyticket(Ticket $ticket){
        //dd($ticket);
        return view('replyticket', ['ticket' => $ticket]);
    }
    public function adressticket(Ticket $ticket, Request $request){
        $data=$request->validate([
            'ticket_reply' => ['required'],
        ]);
        ///dd($request->ticket_reply);
        Ticket::where('id', $ticket->id)
            ->update(['ticket_reply' => $request->ticket_reply]);
        $user = User::where('id', $ticket->user_id)->get();
        Notification::send($user, new ticketAdressed);
        return redirect(route('dashboard'));
    }
}
