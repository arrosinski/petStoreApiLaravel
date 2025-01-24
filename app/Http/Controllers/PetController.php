<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PetController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => config('petstore.base_uri')]);    }

    public function index()
    {
        $response = $this->client->get('pet/findByStatus', ['query' => ['status' => 'available']]);
        $pets = json_decode($response->getBody(), true);
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $this->client->post('pet', ['json' => $request->all()]);
        return redirect('/pets');
    }

    public function edit($id)
    {
        $response = $this->client->get("pet/{$id}");
        $pet = json_decode($response->getBody(), true);
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $this->client->put("pet", ['json' => array_merge(['id' => $id], $request->all())]);
        return redirect('/pets');
    }

    public function destroy($id)
    {
        try {
            $response = $this->client->delete("https://petstore.swagger.io/v2/pet/{$id}");
            return redirect('/pets')->with('success', 'Pet deleted successfully.');
        } catch (RequestException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() == 404) {
                return redirect('/pets')->with('error', 'Pet not found.');
            }
            return redirect('/pets')->with('error', 'An error occurred while deleting the pet.');
        }
    }
}
