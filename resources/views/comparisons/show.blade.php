@extends('layouts.master')

@section('content')
<div>
    <br />
    @if($comparison->match)
        <div class="alert alert-success" role="alert">
            Las huellas coinciden
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Las huellas no coinciden
        </div>
    @endif
    <div class="row">
        <h1>Comparasión</h1>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hand">Mano:</label><br>
                        <label>{{$comparison->hand}}</label>
                    </div>  
                </div>  
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="zone">Zona a comparar:</label><br>
                        <label>{{$comparison->region}}</label>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:50px;">

                <div class="col-md-6">
                    <div class="text-center">
                        <canvas class="img-fluid" id="canvasT"  onclick="onClickHandler(event)">
                    </div>
                    <div class="form-group">
                        <label>Plantilla</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="text-center">
                        <canvas class="img-fluid" id="canvasQ"  onclick="onClickHandler(event)">
                    </div>
                    <label>Consulta</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:100px;">
        <h1>Resultados</h1>
        
        <div class="col-md-12">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Porcentaje</th>
                            <th scope="col">Plantilla</th>
                            <th scope="col">Image</th>
                            <th scope="col">Angulo</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($comparison->coincidents as $i=>$coincident)
                        <tr>
                            <th scope="row">{{($i + 1)}}</th>
                            <td>{{$coincident->percentage * 100}}%</td>
                            <td>{{$coincident->minutias->first()->x}}, {{$coincident->minutias->first()->x}}</td>
                            <td>{{$coincident->minutias->last()->x}}, {{$coincident->minutias->last()->x}}</td>
                            <td>{{$coincident->minutias->first()->angle}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/minutia.drawer.js') }}"></script>
@endsection