
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">@lang('admin.main_navigation')</li>
    <li>
        <a href="{{route('admin')}}">
            <i class="fa fa-dashboard"></i> <span>@lang('admin.dashboard')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>
     <li>
        <a href="{{route('inf_menus.index')}}">
            <i class="fa fa-bars"></i> <span>@lang('admin.menu')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>
     <li>
        <a href="{{route('inf_pages.index')}}">
            <i class="fa fa-newspaper-o"></i> <span>@lang('admin.pages')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-image"></i>
            <span>@lang('admin.images')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('image_categories.index') }}"><i class="fa fa-list-alt"></i> @lang('admin.images_categories')</a></li>
            <li><a href="{{ route('images.index') }}"><i class="fa fa-image"></i> @lang('admin.images')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i> <span>@lang('admin.components')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('languages.index')}}"><i class="fa fa-language"></i> @lang('admin.languages')</a></li>
            <li><a href="{{route('id_documents.index')}}"><i class="fa fa-newspaper-o"></i> @lang('admin.documents_id')</a></li>
            <li><a href="{{route('countries.index')}}"><i class="fa fa-flag"></i> @lang('admin.countries')</a></li>
            <li><a href="{{route('social_links.index')}}"><i class="fa fa-share-alt"></i> @lang('admin.social_links')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-home"></i>
            <span>@lang('admin.home_page')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('introduction_points.index')}}"><i class="fa fa-map-marker"></i> @lang('admin.introduction_points')</a></li>
            <li><a href="{{route('introductions.index')}}"><i class="fa fa-file-text"></i> @lang('admin.introduction')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-clock-o"></i>
            <span>@lang('admin.active_plan')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('inf_plan_phases.index')}}"><i class="fa fa-qrcode"></i> @lang('admin.phases_plan')</a></li>
            <li><a href="{{route('inf_plan_phase_sections.index')}}"><i class="fa fa-map-signs"></i> @lang('admin.phases_plan_directions')</a></li>
            <li><a href="{{route('inf_plan_phase_section_points.index')}}"><i class="fa fa-map-pin"></i> @lang('admin.plan_points')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-play-circle"></i>
            <span>@lang('admin.video')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('inf_video_groups.index')}}"><i class="fa fa-file-text"></i> @lang('admin.video_groups')</a></li>
            <li><a href="{{route('inf_video_group_sections.index')}}"><i class="fa fa-file-text-o"></i> @lang('admin.video_group_sectors')</a></li>
            <li><a href="{{route('inf_videos.index')}}"><i class="fa fa-file-video-o"></i> @lang('admin.videos')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="{{route('video_collections.index')}}">
            <i class="fa fa-youtube-play"></i>
            <span>@lang('admin.videos_collections')</span>
            <span class="pull-right-container">
      <span class="label label-primary pull-right">4</span>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('video_collections.index')}}"><i class="fa fa-tv"></i> @lang('admin.all_part')</a></li>
            <li><a href="#"><i class="fa fa-info-circle"></i> @lang('admin.informative_part')</a></li>
            <li><a href="#"><i class="fa fa-wrench"></i> @lang('admin.technology_part')</a></li>
            <li><a href="#"><i class="fa fa-heart"></i> @lang('admin.enebra_videos_part')</a></li>
            <li><a href="#"><i class="fa  fa-rocket"></i> @lang('admin.motivation_part')</a></li>
        </ul>
    </li>
    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-laptop"></i>--}}
            {{--<span>UI Elements</span>--}}
            {{--<span class="pull-right-container">--}}
      {{--<i class="fa fa-angle-left pull-right"></i>--}}
    {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>--}}
            {{--<li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>--}}
            {{--<li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>--}}
            {{--<li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>--}}
            {{--<li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>--}}
            {{--<li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-edit"></i> <span>Forms</span>--}}
            {{--<span class="pull-right-container">--}}
      {{--<i class="fa fa-angle-left pull-right"></i>--}}
    {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>--}}
            {{--<li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>--}}
            {{--<li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-table"></i> <span>Tables</span>--}}
            {{--<span class="pull-right-container">--}}
      {{--<i class="fa fa-angle-left pull-right"></i>--}}
    {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>--}}
            {{--<li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li>--}}
        {{--<a href="pages/calendar.html">--}}
            {{--<i class="fa fa-calendar"></i> <span>Calendar</span>--}}
            {{--<span class="pull-right-container">--}}
      {{--<small class="label pull-right bg-red">3</small>--}}
      {{--<small class="label pull-right bg-blue">17</small>--}}
    {{--</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    {{--<li>--}}
        {{--<a href="pages/mailbox/mailbox.html">--}}
            {{--<i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
            {{--<span class="pull-right-container">--}}
      {{--<small class="label pull-right bg-yellow">12</small>--}}
      {{--<small class="label pull-right bg-green">16</small>--}}
      {{--<small class="label pull-right bg-red">5</small>--}}
    {{--</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-folder"></i> <span>Examples</span>--}}
            {{--<span class="pull-right-container">--}}
      {{--<i class="fa fa-angle-left pull-right"></i>--}}
    {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
            {{--<li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>--}}
            {{--<li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>--}}
            {{--<li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>--}}
            {{--<li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>--}}
            {{--<li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>--}}
            {{--<li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>--}}
            {{--<li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>--}}
            {{--<li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>--}}
            {{--<li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-share"></i> <span>Multilevel</span>--}}
            {{--<span class="pull-right-container">--}}
      {{--<i class="fa fa-angle-left pull-right"></i>--}}
    {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#"><i class="fa fa-circle-o"></i> Level One--}}
                    {{--<span class="pull-right-container">--}}
          {{--<i class="fa fa-angle-left pull-right"></i>--}}
        {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
                    {{--<li class="treeview">--}}
                        {{--<a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
                            {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                        {{--</a>--}}
                        {{--<ul class="treeview-menu">--}}
                            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
    {{--<li class="header">LABELS</li>--}}
    {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
</ul>
