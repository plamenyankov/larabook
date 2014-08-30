<nav class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1><a class="navbar-brand" href="{{Auth::check()? route('statuses_path'):route('home')}}">Larabook</a></h1></li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
       </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li>{{link_to_route('users_path','Browse Users')}}</li>
        </ul>
        </section>

    <section class="top-bar-section">
        <ul class="right">
            @if($currentUser)
            <li class="has-dropdown"><a href="#">
                    @include('layouts.partials.avatar',['user'=>$currentUser])

                    {{$currentUser->username}}</a>
                <ul class="dropdown">
                    <li>{{link_to_route('profile_path','Your profile',$currentUser->username)}}</li>
                    <li><a href="/logout">Log out</a></li>
                </ul>
            </li>
            @else

            <li>{{ link_to_route('register_path','Register') }}</li>
            <li>{{ link_to_route('login_path','Log In') }}</li>

            @endif
        </ul>
        </section>

</nav>
