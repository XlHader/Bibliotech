<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientCollection;
use App\Models\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ClientCollection(Client::with('documentType')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();
        $client = Client::create($data);
        return jsonResponse('El cliente se ha creado correctamente.', $client, 201);
    }

    /**
     * Display the specified resource by id.
     */
    public function show(int $clientId)
    {
        try {
            $client = Client::findOrFail($clientId);
            return jsonResponse('El cliente se ha obtenido correctamente.', $client);
        } catch (ModelNotFoundException $exception) {
            return jsonResponse('El cliente que desea obtener no existe.', null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, int $clientId)
    {
        try {
            $client = Client::findOrFail($clientId);
            $data = $request->validated();
            $client->update($data);
            return jsonResponse('El cliente se ha actualizado correctamente.', $client);
        } catch (ModelNotFoundException $exception) {
            return jsonResponse('El cliente que desea actualizar no existe.', null, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $clientId)
    {
        try {
            $client = Client::findOrFail($clientId);
            $client->delete();
            return jsonResponse('El cliente se ha eliminado correctamente.');
        } catch (ModelNotFoundException $exception) {
            return jsonResponse('El cliente que desea eliminar no existe.', null, 404);
        }
    }
}