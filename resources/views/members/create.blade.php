@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="mb-0">Nuevo Miembro</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('members.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" name="name" class="form-control form-control-lg" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cédula</label>
                        <input type="number" name="cedula" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="tel" name="phone" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo Membresía</label>
                    <select name="membership_type" class="form-select" required>
                        <option value="Mensual">Mensual</option>
                        <option value="Trimestral">Trimestral</option>
                        <option value="Anual">Anual</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha Vencimiento</label>
                    <input type="date" name="end_date" class="form-control" required>
                    <div class="form-text">La fecha de inicio se asignará hoy automáticamente.</div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar Miembro</button>
                    <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
