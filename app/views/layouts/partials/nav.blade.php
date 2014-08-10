
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
                <!-- login errors -->
                <div class="form-group">
                    <span id="error-message" class="center-block error-log-in"></span>
                </div>

                <div class="form-group">
                    {{ Form::email('email', null, ['id' => 'email-input', 'class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password', ['id' => 'password-input', 'class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
                </div>
                {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}

                <div class="form-group">
                    <a href="{{ URL::to('/password-reset') }}" class="forgot-password">forgot password?</a>
                </div>
            {{ Form::close() }}
        @else
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p class="navbar-text">Welcome - {{ Auth::user()->first_name }}</p>
                </li>

                @if (Auth::user()->first_name == 'admin')
                    <li>
                        <a href="{{ URL::to('member/logout') }}"><span class="glyphicon glyphicon-off"></span> &nbsp;Logout</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ URL::to('member/profile') }}"><span class="glyphicon glyphicon-user"></span> &nbsp;Profile</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('member/transaction') }}"><span class="glyphicon glyphicon-tasks"></span> &nbsp;Transactions</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('member/logout') }}"><span class="glyphicon glyphicon-off"></span> &nbsp;Logout</a>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
