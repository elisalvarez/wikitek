@extends('layouts.app')

<form action="{{ route('registro.store') }}" method="POST">
    @csrf
    <div class="container mt-3 mb-5 p-4">

        <h2 class="mb-4">Registro</h2>
        
        <!-- Nombres -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="nombre" class="form-label">Nombres</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe tu nombre" required>
            </div>
        </div>

        <!-- Apellidos -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" placeholder="Escribe tu apellido paterno" required>
            </div>
            <div class="col-md-6">
                <label for="apellido_materno" class="form-label">Apellido Materno</label>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" placeholder="Escribe tu apellido materno" required>
            </div>
        </div>

        <!-- Información personal -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="id_genero" class="form-label">Género</label>
                <select name="id_genero" id="id_genero" class="form-select" required>
                    @foreach($generos as $genero)
                        <option value="{{ $genero->id_genero }}">{{ $genero->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" placeholder="Escribe tu edad" required>
            </div>
            <div class="col-md-4">
                <label for="id_estado_civil" class="form-label">Estado Civil</label>
                <select name="id_estado_civil" id="id_estado_civil" class="form-select" required>
                    @foreach($estadosCiviles as $estadoCivil)
                        <option value="{{ $estadoCivil->id_estado_civil }}">{{ $estadoCivil->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Correos -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com" required>
            </div>
        </div>

        <!-- Contraseña -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Escribe tu contraseña" required>
            </div>
        </div>

        <!-- Nivel de Interés y Carrera -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="id_nivel_interes" class="form-label">Nivel de Interés</label>
                <select name="id_nivel_interes" id="id_nivel_interes" class="form-select" required onchange="getCarreras()">
                    @foreach($nivelesInteres as $nivel)
                        <option value="{{ $nivel->id_nivel_interes }}" {{ old('id_nivel_interes') == $nivel->id_nivel_interes ? 'selected' : '' }}>
                            {{ $nivel->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="id_carrera" class="form-label">Carrera</label>
                <select name="id_carrera" id="id_carrera" class="form-select" required>
                    <option value="">Selecciona una carrera</option>
                </select>
            </div>
        </div>

        <!-- Botón de enviar -->
        <div class="row mt-5">
            <div class="col-8">
                @if ($errors->any())
                    <div class="alert alert-danger mx-2">
                        <p>Por favor corrige los siguientes errores:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-4 text-end">
                <button type="submit" class="btn btn-primary w-50">Enviar</button>
            </div>
        </div>
    </div>
</form>

<script>
    function getCarreras() {
        const nivelId = document.getElementById("id_nivel_interes").value;

        fetch(`/obtener-carreras/${nivelId}`)
            .then(response => response.json())
            .then(data => {
                const carreraSelect = document.getElementById("id_carrera");
                carreraSelect.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(carrera => {
                        const option = document.createElement("option");
                        option.value = carrera.id_carrera;
                        option.text = carrera.nombre;
                        carreraSelect.appendChild(option);
                    });
                } else {
                    const option = document.createElement("option");
                    option.text = "No hay carreras disponibles";
                    carreraSelect.appendChild(option);
                }
            })
            .catch(error => {
                console.error('Error al obtener las carreras:', error);
            });
    }
</script>
