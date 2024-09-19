<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use \Carbon\Carbon;
use App\Http\Resources\Api\Order as OrderResource;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order=Order::orderBy('id','desc')->whereIn('status',['process', 'delivered']);
        

       
         if($request->date){
            $date = $this->normalizeDate($request->date);
            if ($date) {
                $order = $order->where('order_date', $date);
            }
            // dd($order);
    
         }
         if ($request->fromdate && $request->todate) {
            $fromDate = $this->normalizeDate($request->fromdate);
            $toDate = $this->normalizeDate($request->todate);
            if ($fromDate && $toDate) {
                $order = $order->whereDate('order_date', '>=', $fromDate)
                ->whereDate('order_date', '<=', $toDate);
            }
        }
        if ($request->name) {
        $order = $order->whereHas('customer', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->name . '%');
        });
        // dd($order->get());
        }

        if($request->id){
            $order=$order->where('id',$request->id);
        }
         if($request->page==null)
         {
            $order=$order->get();

         }
         
         else{
            $order=$order->paginate(20);
         }
         if ($order->isEmpty()) {
            return response()->json(['message' => 'No records found']);
        }

// dd($order);
         
         $lists=OrderResource::collection($order);

         return $lists;
         return response()->json($lists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function normalizeDate($date)
{
    $formats = ['Y-m-d', 'd/m/Y', 'm/d/Y', 'd-m-Y', 'm-d-Y','d-Y-m'];

    foreach ($formats as $format) {
        try {
            $parsedDate = Carbon::createFromFormat($format, $date);
            if ($parsedDate && $parsedDate->format($format) === $date) {
                return $parsedDate->format('Y-m-d');
            }
        } catch (\Exception $e) {
            continue;
        }
    }

    return null; // Return null if no format matches
}
}
