@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Historial de comparaciones</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Mano</th>
                    <th scope="col">Región</th>
                    <th scope="col"># de coincidencias</th>
                    <th scope="col">¿Coincidió?</th>
                    <th scope="col">Fecha de consulta</th>
                </tr>

            </thead>
            <tbody>
                @foreach(Auth::user()->comparisons as $comparison)
                    <tr>
                        <td>{{$comparison->id}}</td>
                        <td>{{$comparison->hand}}</td>
                        <td>{{$comparison->region}}</td>
                        <td>{{sizeof($comparison->coincidents)}}</td>
                        @if($comparison->match == 1)
                            <td>Sí</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>{{$comparison->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection