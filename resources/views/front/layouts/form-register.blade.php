<body class="create">
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('site.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('site.signup') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('site.name') }}">

                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('site.email') }}">

                    <input placeholder="{{ __('site.birthdate') }}" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('site.bloodtype') }}">

                    <select class="form-control" id="governorates" name="governorate">
                        <option selected="" disabled="" hidden="" value="">{{ __('site.governorate') }}</option>
                        <option value="1">الدقهلية</option>
                        <option value="2">الغربية</option>
                    </select>

                    <select class="form-control" id="cities" name="city">
                        <option selected="" disabled="" hidden="" value="">{{ __('site.city') }}</option>
                    </select>

                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('site.phone') }}">

                    <input placeholder="{{ __('site.lastdate') }}" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{ __('site.password') }}">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{ __('site.confirmpassword') }}">

                    <div class="create-btn">
                        <input type="submit" value="{{ __('site.create') }}">
                    </div>
                    <!-- Display errors at the bottom of the form -->
                     @if ($errors->any())
                      <div class="error-messages">
                        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul> </div> @endif
                </form>
            </div>
        </div>
    </div>
</body>
