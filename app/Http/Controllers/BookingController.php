<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ScheduledClass;

class BookingController extends Controller
{
    public function create(){
        $scheduledClass = ScheduledClass::where('date_time','>',now())
        ->with(['classType' , 'instructor'])
        ->whereDoesntHave('members', function($query){
            $query->where('user_id' , auth()->user()->id);
        })
        ->oldest('date_time')->get();
        return view('member.book')->with('scheduledClasses',$scheduledClass);
    }

    public function store(Request $request){
        auth()->user()->bookings()->attach($request->scheduled_class_id);
        return redirect()->route('booking.index');
    }

    public function index(){
        $bookings=auth()->user()->bookings()->where('date_time' , '>' , now())->get();
        return view('member.upcoming')->with('bookings',$bookings);
    }

    public function destroy(int $id){
        auth()->user()->bookings()->detach($id);
        return redirect()->route('booking.index');
    }
}
