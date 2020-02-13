<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Materiale;
use App\User;
use Validator;

class MaterialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return Materiale::where( );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|min:3'
        ];

        $validator =  Validator::make ( $request->all(), $rules );
        if ( $validator -> fails( ) ) 
            /// Bad request
            return response() -> json( $validator->errors(), 400 );
        

        $materiale = Materiale::create( $request -> all( ) );
        return response() -> json( $materiale, 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiale = Materiale::find ( $id );

        if ( is_null ( $materiale ) ) 
            return response() -> json ( ['message' => 'Selected material does not exist' ] );

        return response() -> json ( $materiale, 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download ( $id )
    {
        $materiale = Materiale::find ( $id );

        if ( is_null ( $materiale ) ) 
            return response() -> json ( ['message' => 'Selected material does not exist' ] );

        $owner = User::find ( $materiale -> user_id );
        if ( is_null ( $owner ) ) 
            return response() -> json ( ['message' => 'Material owner does not exist' ] );
        
            /// Increasing points
        $owner -> punteggio = $owner -> punteggio + 1;
        $owner -> save();

        /* Decreasing points
        $user = User::find ( Auth::id() );
        if ( is_null ( $user ) ) 
            return response() -> json ( ['message' => 'Current user does not exist' ] );
        
            $user -> punteggio = $user -> punteggio - 1;
        $user -> save();
        */
        return response() -> json ( $materiale, 200 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $rules = [
            'nome' => 'required|min:3'
        ];

        $validator =  Validator::make ( $request->all(), $rules );

        if ( $validator -> fails( ) ) 
            /// Bad request
            return response() -> json( $validator->errors(), 400 );

        $materiale = Materiale::find($id);
        
        if( is_null( $materiale ) )
            return response() -> json( [ 'message' => 'Selected material does not exist' ], 404 );
        
        $materiale -> update( $request -> all() );
        return response() -> json( $materiale, 200 );   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materiale = Materiale::find($id);
        
        if( is_null( $materiale ) )
            return response() -> json( [ 'message' => 'Selected material does not exist' ], 404 );
        
        $materiale -> update( $request -> all() );
        return response() -> json( $materiale, 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materiale = Materiale::find($id);
        if( is_null ( $materiale ) )
            return response() -> json( ['message'=>'Record does not exist'], 404 );
        
        $materiale -> delete();
        return response() -> json ( 204 );
    }
}
