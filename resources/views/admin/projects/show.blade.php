@extends('layouts.admin')

@section('content')
    <div class="show">
        <div class="card-wrapper">
            <div class="card-csm">
                <div class="card-front">
                    <div class="layer">
                        <div class="corner"></div>
                        <div class="corner"></div>
                        <div class="corner"></div>
                        <div class="corner"></div>

                        <div class="p-3">
                            <h2>{{ $project->name }}</h2>
                            <div class="row">
                                <div class="col-8">
                                    @if($project?->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->image_name }}">
                                    @endif
                                    <p><strong>Descrizione: </strong>{{ $project->description }}</p>
                                </div>
                                <div class="col-4">
                                    <p>Data di inizio: {{ $project->start_date }}</p>
                                    <p>Data di fine: {{ $project->end_date }}</p>
                                    <p>Stato: {{ $project->status }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>








    </div>
@endsection
