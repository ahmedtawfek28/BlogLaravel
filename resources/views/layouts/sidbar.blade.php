<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @if (Auth::guard()->check()&& Auth::user()->role->id == 1) {

                        <li class="nav-small-cap">--- PERSONAL</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard <span class="label label-rounded label-success">4</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-tachometer"></i> Dashboard </a></li>
                                <li><a href="{{ route('admin.tag.index') }}"> <i class="fa fa fa-tags"></i> Tag </a></li>
                                <li><a href="{{ route('admin.category.index') }}"> <i class="fa fa-th-large"></i> Category </a></li>
                                <li><a href="{{ route('admin.post.index') }}"> <i class="fa fa-file-text-o"></i> Post </a></li>
                                <li><a href="{{ route('admin.post.pending') }}"> <i class="fa fa-file-text-o"></i> Pending Posts </a></li>
                                <li><a href="{{ route('admin.subscriber.index') }}"> <i class="fa fa-file-text-o"></i> subscriber </a></li>
                                

                            </ul>
                        </li>}
                        @else 
                        {

                            <li class="nav-small-cap">--- PERSONAL</li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard <span class="label label-rounded label-success">4</span></span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('author.dashboard') }}"> <i class="fa fa-tachometer"></i> Dashboard </a></li>
                                    <li><a href="{{ route('author.post.index') }}"> <i class="fa fa-file-text-o"></i> Post </a></li>
                                </ul>
                            </li>}
                        @endif

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>