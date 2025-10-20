<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use App\Http\Requests\VendedorRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VendedorController extends Controller
{
    public function index(Request $request): View
    {
        $order = $request ->get('order','asc');

        $vendedores = Vendedor::query()->when($request->search, function($q,$search)
        {
            $q ->where('nombre', 'like', "%{$search}%")
             ->orWhere('apellido', 'like', "%{$search}%");
        })
        ->orderBy('nombre', $order)
        ->paginate(10);
        return view('vendedores.index', compact('vendedores', 'order'));
    }


    public function create(): View
    {
        return view('vendedores.create');
    }

   
    public function store(VendedorRequest $request): RedirectResponse
    {
        Vendedor::create($request->validated());
        return redirect()->route('vendedores.index')->with('success', 'Vendedor creado con éxito');
    }

    public function show(Vendedor $vendedor): View
    {
        return view('vendedores.show', compact('vendedor'));
    }

    public function edit(Vendedor $vendedor): View
    {
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(VendedorRequest $request, Vendedor $vendedor): RedirectResponse
    {
        $vendedor->update($request->validated());
        return redirect()->route('vendedores.index')->with('success', 'Vendedor actualizado con éxito');
    }

    public function destroy(Vendedor $vendedor): RedirectResponse
    {
        $vendedor->delete();
        return redirect()->route('vendedores.index')->with('success', 'Vendedor eliminado con éxito');
        return redirect()->route('vendedores.index')->with('warning', 'Vendedor eliminado con éxito.');
    }
}
