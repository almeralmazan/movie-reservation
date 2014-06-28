<header>
    <div class="contain-to-grid">
        <nav class="top-bar" data-topbar="">
            <!-- Title -->
            <ul class="title-area">
                <li class="name">
                    <h1>
                        {{ HTML::link('/', 'Movie Reservation') }}
                    </h1>
                </li>

                <!-- Mobile Menu Toggle -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <!-- Top Bar Section -->

            <section class="top-bar-section">
                <!-- Top Bar Right Nav Elements -->
                <ul class="right">
                    @if ( ! Auth::check())

                        {{ Form::open(['url' => 'member/login', 'id' => 'member-login']) }}
                            <li class="has-form">
                                {{ Form::email('email', null, ['id' => 'email-input', 'placeholder' => 'Email', 'required' => 'required']) }}
                            </li>
                            <li class="has-form">
                                {{ Form::password('password', ['id' => 'password-input', 'placeholder' => 'Password', 'required' => 'required']) }}
                            </li>
                            <li class="has-form">
                                {{ Form::submit('Login', ['class' => 'button']) }}
                            </li>
                            {{ Form::close() }}
                    @else
                        {{ HTML::link('member/logout', 'Logout', ['class' => 'button']) }}
                    @endif
                </ul>
            </section>
        </nav>
    </div>
</header>