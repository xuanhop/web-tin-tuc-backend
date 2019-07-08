@extends('layouts.master')

@section('title', 'location')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">Map</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7447.112414542022!2d105.7830305!3d21.050436100000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x21150c60539b1a28!2sC%C3%94NG+TY+TNHH+GEMMOB!5e0!3m2!1svi!2sus!4v1562578685087!5m2!1svi!2sus"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

    </div>
@endsection