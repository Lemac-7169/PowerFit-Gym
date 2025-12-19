<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index()
    {
        // Paginamos de 10 en 10 para que se vea bien en móvil
        $members = Member::latest()->paginate(10);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cedula' => 'required|unique:members',
            'phone' => 'required',
            'membership_type' => 'required',
            'end_date' => 'required|date|after:today',
        ]);

        // Lógica automática requerida por el cliente
        $member = new Member($request->all());
        $member->start_date = Carbon::now(); // Fecha automática
        $member->is_active = true;
        $member->save();

        return redirect()->route('members.index')->with('success', '¡Miembro registrado!');
    }

    // Método para borrar sin perder el dato (Soft Delete)
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Registro archivado correctamente.');
    }
}
