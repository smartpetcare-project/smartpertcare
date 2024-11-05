@extends('layouts.app')
@section('title')
    Carousel
@endsection
@section('content')
    <x-page-title title="Components" subtitle="Carousels" />


    <div class="row row-cols-1 row-cols-lg-12 row-cols-xl-12">
        <div class="col">
            <h6 class="mb-0 text-uppercase">Slides only</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h6 class="mb-0 text-uppercase">With controls</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h6 class="mb-0 text-uppercase">With controls</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h6 class="mb-0 text-uppercase">With captions</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h6 class="mb-0 text-uppercase">With Crossfade</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x768/png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                            data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                            data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
