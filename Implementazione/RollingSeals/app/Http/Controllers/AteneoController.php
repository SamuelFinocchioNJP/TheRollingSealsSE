<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ateneo;
use Validator;

class AteneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ateneo::all( );
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
            'nome' => 'required|min:3',
            'citta' => 'required',
            'indirizzo' => 'required',
        ];

        $validator =  Validator::make ( $request->all(), $rules );
        if ( $validator -> fails( ) ) 
            /// Bad request
            return response() -> json( $validator->errors(), 400 );

        $ateneo = Ateneo::create( $request -> all( ) );
        return response() -> json( $ateneo, 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ateneo = Ateneo::find($id);

        if ( is_null ( $ateneo ) ) 
            return response() -> json ( ['message' => 'Selected University does not exist' ] );

        return response() -> json ( $ateneo, 200 );
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
            'nome' => 'required|min:3',
            'citta' => 'required',
            'indirizzo' => 'required',
        ];

        $validator =  Validator::make ( $request->all(), $rules );

        if ( $validator -> fails( ) ) 
            /// Bad request
            return response() -> json( $validator->errors(), 400 );

        $ateneo = Ateneo::find($id);
        
        if( is_null( $ateneo ) )
            return response() -> json( [ 'message' => 'Selected course does not exist' ], 404 );
        
        $ateneo -> update( $request -> all() );
        return response() -> json( $ateneo, 200 );   
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
        $ateneo = Ateneo::find($id);
        
        if( is_null( $ateneo ) )
            return response() -> json( [ 'message' => 'Selected University does not exist' ], 404 );
        
        $ateneo -> update( $request -> all() );
        return response() -> json( $ateneo, 200 );   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ateneo = Ateneo::find($id);
        if( is_null ( $ateneo ) )
            return response() -> json( ['message'=>'Record does not exist'], 404 );
        
        $ateneo -> delete();
        return response() -> json ( 204 );
    }
}
