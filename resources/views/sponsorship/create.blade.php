@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group mt-5">
            <div class="row">
                <form method="POST" action="{{ route('sponsorship.store', ['apartment_id' => $apartment->id]) }}">
                    @csrf

                    <div class="row">
                        <div class="col-4">
                            <div class="adv-card">
                                <span class="title-adv">Base</span>
                                <div class="price">
                                    <h2>2,99€</h2>
                                    <span>/24 ore</span>
                                </div>
                                <input type="hidden" name="type" value="base">
                                <button type="submit">Acquista</button>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="adv-card">
                                <span class="title-adv">Standard</span>
                                <div class="price">
                                    <h2>5,99€</h2>
                                    <span>/72 ore</span>
                                </div>
                                <input type="hidden" name="type" value="standard">
                                <button type="submit">Acquista</button>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="adv-card">
                                <span class="title-adv">Avanzato</span>
                                <div class="price">
                                    <h2>9,99€</h2>
                                    <span>/144 ore</span>
                                </div>
                                <input type="hidden" name="type" value="avanzato">
                                <button type="submit">Acquista</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
