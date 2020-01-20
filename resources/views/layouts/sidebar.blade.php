<div class="sidebar" data-color="blue"><!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            CT
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
            Marathon
        </a>
    </div>



    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        @if(auth()->user()->type_id == 1 || auth()->user()->type_id ==3)

            <li class="{{ '/participants' == request()->path() ? 'active' : '' }}">
                <a href="/system-user">
                    <i class="now-ui-icons design_app"></i>
                    <p>System User</p>
                </a>
            </li>



            <li class="{{ '/participants' == request()->path() ? 'active' : '' }}">
                <a href="/organizer">
                    <i class="now-ui-icons design_app"></i>
                    <p>Organizer</p>
                </a>
            </li>



            <li class="{{ '/participants' == request()->path() ? 'active' : '' }}">
                <a href="/participant">
                    <i class="now-ui-icons design_app"></i>
                    <p>Participant</p>
                </a>
            </li>

            <li class="{{ '/participants' == request()->path() ? 'active' : '' }}">
                <a href="/category">
                    <i class="now-ui-icons design_app"></i>
                    <p>Category</p>
                </a>
            </li>

            <li class="{{ '/participants' == request()->path() ? 'active' : '' }}">
                <a href="/event">
                    <i class="now-ui-icons design_app"></i>
                    <p>Up Comming Events</p>
                </a>
            </li>


                <li >
                    <a href="{{url('event-today')}}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Event today</p>
                    </a>
                </li>

                <li >
                    <a href="{{url('report')}}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Report</p>
                    </a>
                </li>
        @else


                <li class="{{ '/participants' == request()->path() ? 'active' : '' }}">
                    <a href="{{url('participant-join-event')}}">
                        <i class="now-ui-icons design_app"></i>
                        <p>My Active Listing</p>
                    </a>
                </li>


            {{--<li>--}}
                {{--<a href="./notifications.html">--}}
                    {{--<i class="now-ui-icons ui-1_bell-53"></i>--}}
                    {{--<p>Notifications</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="{{ 'reg-participants' == request()->path() ? 'active' : '' }}">--}}
                {{--<a href="/reg-participants">--}}
                    {{--<i class="now-ui-icons users_single-02"></i>--}}
                    {{--<p>User Profile</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="./tables.html">--}}
                    {{--<i class="now-ui-icons design_bullet-list-67"></i>--}}
                    {{--<p>Table List</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="./typography.html">--}}
                    {{--<i class="now-ui-icons text_caps-small"></i>--}}
                    {{--<p>Typography</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="active-pro">--}}
                {{--<a href="./upgrade.html">--}}
                    {{--<i class="now-ui-icons arrows-1_cloud-download-93"></i>--}}
                    {{--<p>Upgrade to PRO</p>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
        @endif
    </div>
</div>