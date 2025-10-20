<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Http\Requests\VentaRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VentaController extends Controller
{
    public function index(Request $request): View
    {
        $order = $request ->get('order','asc');

        $ventas = Venta::query()->when($request->search, function($q,$search)
        {
            $q ->where('descripcion', 'like', "%{$search}%")
             ->orWhere('fecha_venta', 'like', "%{$search}%");
        })
        ->orderBy('precio', $order)
        ->paginate(10);
        return view('ventas.index', compact('ventas', 'order'));
    }

    public function create(): View
    {
        return view('ventas.create');
    }

    public function store(VentaRequest $request): RedirectResponse
    {
        Venta::create($request->validated());
        return redirect()->route('ventas.index')->with('success', 'Venta creada con éxito');
    }

    public function show(Venta $venta): View
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta): View
    {
        return view('ventas.edit', compact('venta'));
    }

    public function update(VentaRequest $request, Venta $venta): RedirectResponse
    {
        $venta->update($request->validated());
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada con éxito');
    }

    public function destroy(Venta $venta): RedirectResponse
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada con éxito');
    }
}
