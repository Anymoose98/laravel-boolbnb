@extends('layouts.authenticated')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-12 margine-superiore">
                <div class="window-title">
                    <h2>I tuoi appartamenti</h2>
                    <p>In questa pagina puoi modificare i tuoi appartamenti, sponsorizzarli o aggiungerli</p>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex justify-content-center">
                <div class="add-apartments-button">
                    <a class="add-btn" href="{{ route('apartments.create') }}">
                        <div class="plus-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <span>Aggiungi un nuovo appartamento</span>
                    </a>
                </div>
            </div>

            @foreach ($apartment as $apartments)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex justify-content-center">
                    <div class="add-apartments-button">
                        <div class="card-option">
                            <div class="single-option">
                                <a href="{{ route('apartments.edit', ['apartment' => $apartments->id]) }}"
                                    class="text-dark">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                            <div class="single-option">
                                <a href="{{ route('sponsorship.create', ['apartment_id' => $apartments->id]) }}"
                                    class="text-dark">
                                    <i class="fas fa-euro"></i>
                                </a>
                            </div>
                            <div class="single-option bg-danger text-white">
                                <button class="btn btn-sm btn-square btn-danger mx-1" data-bs-toggle="modal"
                                    data-bs-target="#modal_project_delete-{{ $apartments->id }}"
                                    data-id="{{ $apartments->id }}" data-name="{{ $apartments->description }}"
                                    data-type="apartments"><i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <a href="{{ route('apartments.show', ['apartment' => $apartments->id]) }}">
                            <div class="img-container">
                                <img src="{{ asset('/storage/' . $apartments->image) }}" alt="{{ $apartments->name }}"
                                    class="card-img-top img-index">
                            </div>
                            <div class="apartments-info">
                                <h2 class="text-truncate">{{ $apartments->address }}</h2>
                                <p class="text-truncate"> {{ $apartments->description }} </p>
                            </div>
                        </a>
                    </div>
                </div>
                @include('apartments.modal_delete')
            @endforeach
        </div>
    </div>
    </div>
    </div>
    </div>

    <style lang="scss">
        .apartments-info {
            padding: 10px 15px;
            color: black;

            h2 {
                font-size: 26px;
                font-weight: 700;
                margin-bottom: 0;
            }

            p {
                color: rgb(125, 125, 125)
            }

        }

        .img-container {
            width: 100%;
            height: calc(70%);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;

            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                border-radius: 20px 20px 0 0;
            }
        }

        .window-title {
            text-align: center;
            margin-top: 20px;

            h2 {
                font-weight: 800;
                font-size: 40px;
            }
        }

        .add-apartments-button:hover .card-option {
            opacity: 1;
        }

        .add-apartments-button {
            background-color: rgb(255, 255, 255);
            width: 300px;
            height: 300px;
            border-radius: 20px;
            position: relative;
            -webkit-box-shadow: 0px 0px 14px 0px #00000026;
            -moz-box-shadow: 0px 0px 14px 0px #00000026;
            -o-box-shadow: 0px 0px 14px 0px #00000026;
            box-shadow: 0px 0px 14px 0px #00000026;



            .card-option {
                position: absolute;
                top: 10px;
                right: 10px;
                display: flex;
                opacity: 0;
                transition-duration: 0.3s;

                .single-option {
                    cursor: pointer;
                    border-radius: 100px;
                    width: 30px;
                    height: 30px;
                    background-color: rgb(255, 255, 255);
                    margin-left: 10px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 14px;

                    button {
                        background-color: rgba(255, 255, 255, 0);
                        border: none;
                    }

                    a {
                        border: none;
                    }

                    &:hover {
                        background-color: rgb(216, 216, 216);
                    }
                }
            }

            .add-btn {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                height: 100%;
                width: 100%;

                .plus-icon {
                    width: 80px;
                    height: 80px;
                    background-color: black;
                    border-radius: 100px;
                    color: white;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 35px;
                }

                span {
                    font-size: 20px;
                    text-align: center;
                    font-weight: 600;
                    color: black;
                    margin-top: 10px
                }

            }

        }
    </style>
@endsection
