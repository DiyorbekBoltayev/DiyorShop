@extends('page.master')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner d-flex justify-content-center" >
                <!-- Register -->
                <div class="card col-sm-12 col-md-4 col-lg-4"  >
                    <div class="card-body">


                        <form id="formAuthentication" class="mb-3" action="{{route('register')}}" method="POST"> @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Enter your name"
                                    autofocus
                                />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email"

                                />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input
                                    id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                />
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Already registered?</span>
                            <a href="{{route('login')}}">
                                <span>Sign in</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>


@endsection
