<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:level')->only('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::orderBy('name')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    public function myClients (int $id)
    {
        $user = User::where('id', $id)->first();
        $clients = $user->clients()->paginate(5);

        return view('clients.clients-my', [
            'clients' => $clients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->user_id       = $request->user_id;
        $client->name          = $request->name;
        $client->email         = $request->email;
        $client->phone         = $request->phone;
        $client->company       = $request->company;
        $client->company_phone = $request->company_phone;

        $client->save();

        return redirect()
            ->route('client.create')
            ->with('msg', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        Client::findOrFail($client->id)->update($request->all());

        return redirect()->route('client.show', $client->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.my', Auth::user()->id);
    }

    public function deleteConfirm ($id)
    {
        return view('clients.delete-confirm', [
            'client' => Client::findOrFail($id)
        ]);
    }
}
