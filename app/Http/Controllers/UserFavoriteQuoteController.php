<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\UserFavoriteQuote;
use Illuminate\Http\Request;

class UserFavoriteQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $user = auth()->user();

        if($user){
            $quote = Quote::find($id);
            $userFavoriteQuote = new UserFavoriteQuote;
            $userFavoriteQuote->quote = $quote['quote'];
            $userFavoriteQuote->user_id = $user->id;
            $userFavoriteQuote->save();
        }else{
            echo "missing user";
        }
        
        return redirect()->route('today.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserFavoriteQuote $userFavoriteQuote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserFavoriteQuote $userFavoriteQuote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserFavoriteQuote $userFavoriteQuote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserFavoriteQuote $userFavoriteQuote)
    {
        //
    }
}
