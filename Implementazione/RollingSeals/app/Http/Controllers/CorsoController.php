<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corso;
use Validator;

class CorsoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Corso::all();
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
            'nome' => 'required|min:3|unique:corso_di_laurea',
            'tipologia' => 'required',
            'durata' => 'required',
            'corso_id' => 'required'
        ];

        $validator =  Validator::make ( $request->all(), $rules );
        if ( $validator -> fails( ) ) 
            /// Bad request
            return response() -> json( $validator->errors(), 400 );
        

        $corso = Corso::create( $request -> all( ) );
        return response() -> json( $corso, 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corso = Corso::find ( $id );

        if ( is_null ( $corso ) ) 
            return response() -> json ( ['message' => 'Selected course does not exist' ] );

        return response() -> json ( $corso, 200 );
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
            'nome' => 'required|min:3|unique:corso_di_laurea',
            'tipologia' => 'required',
            'durata' => 'required',
            'corso_id' => 'required'
        ];

        $validator =  Validator::make ( $request->all(), $rules );

        if ( $validator -> fails( ) ) 
            /// Bad request
            return response() -> json( $validator->errors(), 400 );

        $corso = Corso::find($id);
        
        if( is_null( $corso ) )
            return response() -> json( [ 'message' => 'Selected course does not exist' ], 404 );
        
        $corso -> update( $request -> all() );
        return response() -> json( $corso, 200 );   
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
        $corso = Corso::find($id);
        
        if( is_null( $corso ) )
            return response() -> json( [ 'message' => 'Selected course does not exist' ], 404 );
        
        $corso -> update( $request -> all() );
        return response() -> json( $corso, 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $corso = Corso::find($id);
        if( is_null ( $corso ) )
            return response() -> json( ['message'=>'Record does not exist'], 404 );
        
        $corso -> delete();
        return response() -> json ( 204 );
    }

    public function getExams ( $id ) {
        $corso = Corso::find ( $id );

        if ( is_null ( $corso ) ) 
            return response() -> json ( ['message' => 'Selected course does not exist' ] );

        return response() -> json ( $corso -> exams() -> get(), 200 );
    }
}
