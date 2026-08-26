@extends('layouts.app')

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <!-- Logo -->
                                <img src="{{asset('images/Logo.png')}}" alt="" style="width: 135px;">
                            </span>
                            <!-- <span class="app-brand-text demo text-body fw-bolder">system</span> -->
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Adventure starts here 🚀</h4>
                    <p class="mb-4">Make your app management easy and fun!</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="username"
                                name="name" placeholder="Enter your name" value="{{ old('name') }}" required
                                autocomplete="name" autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Enter your email" value="{{ old('email') }}" required
                                autocomplete="email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required autocomplete="new-password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">{{ __('Confirm Password') }}</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label" for="user-role">Choose: </label>
                            <div class="input-group">
                                <select id="user-role" name="user_role" class="form-control" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="mb-3">
                            <label class="form-label" for="picture">Choose Picture: </label>
                            <div class="input-group">
                                <input type="file" id="picture" name="picture" class="form-control" accept="image/*"
                                    required />
                            </div>
                        </div> -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="javascript:void(0);"
                                        data-bs-toggle="modal"
                                        data-bs-target="#privacyTermsModal">
                                        Privacy Policy & Terms
                                    </a>
                                </label>

                            </div>


                        </div>
                        <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Register') }}</button>
                    </form>



                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="/login">
                            <span>Sign in instead</span>
                        </a>
                    </p>
                    <p class="text-center">
                        <span>Back to welcome page?</span>
                        <a href="/">
                            <span>Go to Welcome</span>
                        </a>
                    </p>
                </div>


            </div>

            <!-- Privacy Policy & Terms Modal -->
            <div class="modal fade" id="privacyTermsModal" tabindex="-1"
                aria-labelledby="privacyTermsModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="privacyTermsModalLabel">
                                Privacy Policy & Terms
                            </h5>

                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                            </button>
                        </div>

                        <div class="modal-body">

                            <h6 class="fw-bold">Privacy Policy</h6>

                            <p class="text-muted">
                                Your privacy is important to us. We are committed to
                                protecting your personal information and ensuring that
                                your data is handled securely and responsibly.
                            </p>

                            <p class="text-muted">
                                Information provided through this system may be used to
                                manage your account, process transactions, maintain
                                records, and provide the services available through the
                                system.
                            </p>

                            <hr>

                            <h6 class="fw-bold">Terms & Conditions</h6>

                            <p class="text-muted">
                                By using this system, you agree to comply with the rules
                                and policies established by the system administrator.
                            </p>

                            <p class="text-muted">
                                You are responsible for keeping your account credentials
                                confidential and for ensuring that the information you
                                provide is accurate and up to date.
                            </p>

                            <p class="text-muted mb-0">
                                Continued use of the system indicates your acceptance of
                                these Privacy Policy and Terms & Conditions.
                            </p>

                        </div>

                        <div class="modal-footer">
                            <button type="button"
                                class="btn btn-primary"
                                data-bs-dismiss="modal">
                                I Understand
                            </button>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>

@endsection