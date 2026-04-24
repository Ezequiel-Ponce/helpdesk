@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard HelpDesk</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $totalTickets }}</h3>
                <p>Tickets</p>
            </div>

            <div class="icon">
                <i class="fas fa-ticket-alt"></i>
            </div>

            <a href="#" class="small-box-footer">
             <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection