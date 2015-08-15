<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests;
use App\Http\Requests\CreateNumberRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Request;


class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = Contacts::all();
        $request = Input::get('keyword');
        if(!empty($request)){
            $contacts = Contacts::WHERE('name', $request)->orWhere('id', $request)->orWhere('phone', $request)->get();
                }
        return view('contacts.index', compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNumberRequest  $request
     * @return Response
     */
    public function store(CreateNumberRequest $request)
    {

        Contacts::create([
                       'name' => $request->get('name'),
                        'phone' => $request->get('phone'),
                     'black_list' => $request->get('black_list') ? $request->get('black_list') : 0
                ]);
        return redirect('contacts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contact = Contacts::findOrFail($id);

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contact = Contacts::findOrFail($id);
        return view('contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateNumberRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CreateNumberRequest $request, $id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->update($request->all());
        return redirect('contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete($id);
        return redirect('contacts');
    }
}
