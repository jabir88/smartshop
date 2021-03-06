<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html"></a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right topnav"  >
  <li class="text-left">
    <a href="{{ route('backup') }}">
      Backup
{{-- <button type="button" name="Backup">Backup</button> --}}

    </a>
  </li>
    @if(Auth::user()->role_id <= 4)
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope fa-fw"></i> {{$countMess}} <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">

            @foreach( $countMessages as $countMessage)
            <li>
                <a href="#">
                    <div>
                        <strong>{{$countMessage->conus_name}}</strong>
                        <span class="pull-right text-muted">
                            <?php $m =  $countMessage->created_at;
                            $res = Carbon\Carbon::parse($m)->diffForHumans();
                            ?>
                            <em>{{$res}}</em>
                        </span>
                    </div>
                    <div>{{$countMessage->conus_mess}}</div>
                </a>
            </li>
            <li class="divider"></li>

            @endforeach

            <li>
                <a class="text-center" href="{{url('admin/contact-message')}}">
                    <strong>Read All Messages</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
        <!-- /.dropdown-messages -->
    </li>
    @endif
    <!-- /.dropdown -->
    @php
        $i = 0;
    @endphp
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-tasks">
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 1</strong>
                            <span class="pull-right text-muted">40% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>

                        </div>
                 </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 2</strong>
                            <span class="pull-right text-muted">20% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 3</strong>
                            <span class="pull-right text-muted">60% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (warning)</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 4</strong>
                            <span class="pull-right text-muted">80% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>See All Tasks</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
        <!-- /.dropdown-tasks -->
    </li>
    <!-- /.dropdown -->
    <li class="dropdown">

        <ul class="dropdown-menu dropdown-alerts">

            @php


                $user =App\User::find(Auth::user()->id);

            @endphp
            @if(Auth::user()->role_id = 1)
                @foreach ($user->unreadNotifications  as $notification)
            <li>
                <a href="{{ url('/admin/markNotiRead/'. $notification->id) }}">

                    <div>
                        <i class="fa fa-user-md"></i>

                        {{$notification->data['username']}} Is Register .


                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
                @php
                    $i++;
                @endphp

                @endforeach
            @endif
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<div>--}}
                        {{--<i class="fa fa-comment fa-fw"></i> New User--}}
                        {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<div>--}}
                        {{--<i class="fa fa-twitter fa-fw"></i> 3 New Followers--}}
                        {{--<span class="pull-right text-muted small">12 minutes ago</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<div>--}}
                        {{--<i class="fa fa-envelope fa-fw"></i> Message Sent--}}
                        {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<div>--}}
                        {{--<i class="fa fa-tasks fa-fw"></i> New Task--}}
                        {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<div>--}}
                        {{--<i class="fa fa-upload fa-fw"></i> Server Rebooted--}}
                        {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li>--}}
                {{--<a class="text-center" href="#">--}}
                    {{--<strong>See All Alerts</strong>--}}
                    {{--<i class="fa fa-angle-right"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i>
            @php
                echo  $i;
            @endphp
            {{--{{ $notification/2 }}--}}
            <i class="fa fa-caret-down"></i>
        </a>

        <!-- /.dropdown-alerts -->
    </li>
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out fa-fw"></i>   {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
