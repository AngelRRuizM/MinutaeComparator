@extends('layouts.master')

@section('content')
<div class="row">
    <h1>Comparar huellas</h1>

    <form class="col-md-12" method="POST" action="{{route('comparisons.store')}}" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hand">Selecciona la mano</label>
                    <select class="form-control {{ $errors->has('hand') ? ' is-invalid' : '' }}" id="hand" name="hand">
                        <option value="">Region</option>
                        <option value="derecha">Izquierda</option>
                        <option value="izquierda">Derecha</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('hand') }}
                    </div>
                </div>  
            </div>  
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="zone">Selecciona la zona a comparar</label>
                    <select class="form-control {{ $errors->has('region') ? ' is-invalid' : '' }}" id="region" name="region">
                        <option value="">Zona</option>
                        <option value="pulgar">Pulgar</option>
                        <option value="índice">Índice</option>
                        <option value="medio">Medio</option>
                        <option value="anular">Anular</option>
                        <option value="meñique">Meñique</option>
                        <option value="palma">Palma</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('region') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:50px;">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="template">Plantilla</label>
                    <input type="file" class="form-control {{ $errors->has('template') ? ' is-invalid' : '' }}" name="template" id="template">
                    <div class="invalid-feedback">
                        {{ $errors->first('template') }}
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="query">Consulta</label>
                <input type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="query">
                <div class="invalid-feedback">
                    {{ $errors->first('image') }}
                </div>
            </div>
        </div>

        <br />
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="reset" class="btn btn-primary">Reiniciar</button>
                <button type="submit" class="btn btn-success">Comparar</button>
            </div>
        </div>
    </form>
</div>
@endsection