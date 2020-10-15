@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 mx-auto">

            <div class="card border-0 mb-3">
                <post-form></post-form>
            </div>
            <post-list></post-list>


        </div>
        <div class="col-md-5">
            <p></p>
        </div>
    </div>
</div>
@endsection