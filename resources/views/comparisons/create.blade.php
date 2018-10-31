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
                    <select class="form-control" id="hand" name="hand">
                        <option value="derecha">Izquierda</option>
                        <option value="izquierda">Derecha</option>
                    </select>
                </div>  
            </div>  
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="zone">Selecciona la zona a comparar</label>
                    <select class="form-control" id="zone" name="zone">
                        <option value="pulgar">Pulgar</option>
                        <option value="indice">Índice</option>
                        <option value="medio">Medio</option>
                        <option value="anular">Anular</option>
                        <option value="meñique">Meñique</option>
                        <option value="palma">Palma</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:50px;">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="template">Plantilla</label>
                    <input type="file" class="form-control" id="template">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="query">Consulta</label>
                <input type="file" class="form-control" id="query">
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