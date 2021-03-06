<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @if(!Auth::guest())
        <!-- Sidebar user panel -->
        <!--<div class="user-panel">
            <div class="pull-left image">
                <img src="{{ gravatar(Auth::user()->email) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>-->
        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search for transaction...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="{{setActive('category')}}"><a href="{{ url('/category') }}"><i class="fa fa-child"></i> <span>Categories</span></a></li>
            <li class="{{setActive('account')}}"><a href="{{ url('/account') }}"><i class="fa fa-university"></i> <span>Accounts</span></a></li>
            <li class="treeview {{setActiveTree('transaction')}}">
                <a href="#">
                    <i class="fa fa-align-justify"></i> <span>Transactions</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($accounts)
                        @foreach($accounts as $account)
                            <li><a href="{{ url('/transaction/account', ['id' => $account->id]) }}"><i class="fa fa-circle-o"></i> {{ $account->title }}</a></li>
                        @endforeach
                    @else
                        <li><a href="{{ url('/account/create') }}"><i class="fa fa-circle-o"></i> Create account</a></li>
                    @endif
                </ul>
            </li>
            <li class=""><a href="{{ url('/transaction/repeated') }}"><i class="fa fa-repeat"></i> Repeated Transactions</a></li>
            <li class="{{setActive('lending')}}"><a href="{{ url('/lending') }}"><i class="fa fa-medkit"></i> Lendings</a></li>
        </ul>
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
