
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::link('/', 'Movie Reservation', ['class' => 'navbar-brand']) }}
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        @if ( ! Auth::check())

            {{ Form::open(['url' => 'member/login', 'id' => 'member-login', 'class' => 'navbar-form navbar-right', 'role' => 'search']) }}
                <div class="form-group">
                    {{ Form::email('email', null, ['id' => 'email-input', 'class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password', ['id' => 'password-input', 'class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
                </div>
                {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}

        @else

            {{ HTML::link('member/logout', 'Logout', ['class' => 'button']) }}

        @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

