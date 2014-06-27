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

                {{ Form::open(['url' => 'member/login']) }}
                <li class="has-form">
                    {{ Form::text('email', null, ['class' => 'login-input', 'placeholder' => 'Email']) }}
                </li>
                <li class="has-form">
                    {{ Form::password('password', ['class' => 'login-input', 'placeholder' => 'Password']) }}
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