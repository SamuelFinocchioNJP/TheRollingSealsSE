<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Esame;
use Validator;

class EsameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Esame::all();
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
        

        $esame = Esame::create( $request -> all( ) );
        return response() -> json( $esame, 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $esame = Esame::find ( $id );

        if ( is_null ( $esame ) ) 
            return response() -> json ( ['message' => 'Selected exam does not exist' ] );

        return response() -> json ( $esame, 200 );
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

        $esame = Esame::find($id);
        
        if( is_null( $esame ) )
            return response() -> json( [ 'message' => 'Selected exam does not exist' ], 404 );
        
        $esame -> update( $request -> all() );
        return response() -> json( $esame, 200 );   
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
        $esame = Esame::find($id);
        
        if( is_null( $esame ) )
            return response() -> json( [ 'message' => 'Selected exam does not exist' ], 404 );
        
        $esame -> update( $request -> all() );
        return response() -> json( $esame, 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $esame = Esame::find($id);
        if( is_null ( $esame ) )
            return response() -> json( ['message'=>'Record does not exist'], 404 );
        
        $esame -> delete();
        return response() -> json ( 204 );
    }

    public function getMaterials ( $id ) {
        $esame = Esame::find ( $id );

        if ( is_null ( $esame ) ) 
            return response() -> json ( ['message' => 'Selected exam does not exist' ] );

        return response() -> json ( $esame -> materials() -> get(), 200 );
    }
}
