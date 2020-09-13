@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card border-0 mb-3">
                <post-form></post-form>
            </div>
            <post-list></post-list>
        </div>
    </div>
</div>
@endsection