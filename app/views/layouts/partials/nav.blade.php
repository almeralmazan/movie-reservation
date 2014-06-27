<div class="contain-to-grid">
    <nav class="top-bar" data-topbar="">
        <!-- Title -->
        <ul class="title-area">
            <li class="name"><h1><a href="#">Movie Reservation</a></h1></li>

            <!-- Mobile Menu Toggle -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <!-- Top Bar Section -->

        <section class="top-bar-section">
            <!-- Top Bar Right Nav Elements -->
            <ul class="right">
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
            </ul>
        </section>
    </nav>
</div>