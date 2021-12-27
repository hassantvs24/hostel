<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="{{action('Dashboard\DashboardController@index')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li class="navigation-divider"></li>

                    <li class="{{ (Request::is('collection/*','collection') ? 'active' : '') }}"><a href="#"><i class="icon-coins"></i> <span> Collection</span></a>
                        <ul>
                            <li class="{{ (Request::is('collection/new') ? 'active' : '') }}"><a href="{{action('Collections\CollectionListController@index')}}"><i class="icon-diamond3"></i> Bill Collection</a></li>
                            <li class="{{ (Request::is('collection/ledger') ? 'active' : '') }}"><a href="{{action('Collections\CollectionLedgerController@index')}}"><i class="icon-diamond3"></i> Collection Ledger</a></li>
                        </ul>
                    </li>
                    <li class="navigation-divider"></li>
                    <li class="{{ (Request::is('bill/*','bill') ? 'active' : '') }}"><a href="#"><i class="icon-file-presentation"></i> <span> Billing</span></a>
                        <ul>
                            <li class="{{ (Request::is('bill/bill_name') ? 'active' : '') }}"><a href="{{action('Billing\NewBillingController@index')}}"><i class="icon-diamond3"></i> New Billing</a></li>
                            <li class="{{ (Request::is('billing/list') ? 'active' : '') }}"><a href="{{action('Billing\BillingListController@index')}}"><i class="icon-diamond3"></i> Billing List</a></li>
                        </ul>
                    </li>


                    <li class="{{ (Request::is('book/*','book') ? 'active' : '') }}"><a href="#"><i class="icon-safe"></i> <span>Booking</span></a>
                        <ul>
                            <li class="{{ (Request::is('booking') ? 'active' : '') }}"><a href="{{action('Booking\BookingController@index')}}"><i class="icon-diamond3"></i> New Booking</a></li>
                            <li class="{{ (Request::is('booked') ? 'active' : '') }}"><a href="{{action('Booking\BookingController@booked')}}"><i class="icon-diamond3"></i> Booking List</a></li>
                        </ul>
                    </li>
                    <li class="{{ (Request::is('booking/seats') ? 'active' : '') }}"><a href="{{action('Booking\SeatController@index')}}"><i class="icon-bed2"></i> <span>Seat Status</span></a></li>

                    <li class="{{ (Request::is('swap') ? 'active' : '') }}"><a href="{{action('Swap\SwapController@index')}}"><i class="icon-transmission"></i> <span> Seat Swap</span></a></li>

                    <li class="navigation-divider"></li>
                    <li class="{{ (Request::is('report') ? 'active' : '') }}"><a href="{{action('Income\IncomeController@index')}}"><i class="icon-cloud-upload"></i> <span>Income</span></a></li>
                    <li class="{{ (Request::is('expense') ? 'active' : '') }}"><a href="{{action('Expense\ExpenseController@index')}}"><i class="icon-cloud-download"></i> <span>Expense</span></a></li>

                    <li class="navigation-divider"></li>
                    <li class="{{ (Request::is('ranter/*','ranter') ? 'active' : '') }}"><a href="#"><i class=" icon-users4"></i> <span>Ranter</span></a>
                        <ul>
                            <li class="{{ (Request::is('ranter/new') ? 'active' : '') }}"><a href="{{action('Ranter\NewRanterController@index')}}"><i class="icon-diamond3"></i> New Ranter</a></li>
                            <li class="{{ (Request::is('ranter/list') ? 'active' : '') }}"><a href="{{action('Ranter\RanterListController@index')}}"><i class="icon-diamond3"></i> Ranter List</a></li>
                        </ul>
                    </li>

                    <li class="navigation-divider"></li>
                    <li class="{{ (Request::is('seat/*','ranter') ? 'active' : '') }}"><a href="#"><i class=" icon-furniture"></i> <span>Seat</span></a>
                        <ul>
                            <li class="{{ (Request::is('seat/new') ? 'active' : '') }}"><a href="{{action('Seat\SeatController@index')}}"><i class="icon-diamond3"></i> All Seats</a></li>
                            <li class="{{ (Request::is('seat/types') ? 'active' : '') }}"><a href="{{action('Seat\SeatTypeController@index')}}"><i class="icon-diamond3"></i> Seat Types</a></li>
                        </ul>
                    </li>

                    <li class="{{ (Request::is('branch') ? 'active' : '') }}"><a href="{{action('Branch\BranchController@index')}}"><i class="icon-office"></i> <span>Branch</span></a></li>

                    <li class="navigation-divider"></li>
                    <li class=""><a href="#"><i class="icon-user"></i> <span>All Users</span></a></li>
                    <li class="navigation-divider"></li>

                    <li class="{{ (Request::is('reports/*','reports') ? 'active' : '') }}">
                        <a href=""><i class="icon-printer4"></i> <span>Report</span></a>
                        <ul>
                            <li class="{{ (Request::is('report/collection','') ? 'active' : '') }}"><a href="{{action('Report\Collection\CollectionController@index')}}"><i class="icon-diamond3"></i> Collection Report</a></li>
                            <li class="{{ (Request::is('report/income','') ? 'active' : '') }}"><a href="{{action('Report\Income\IncomeController@index')}}"><i class="icon-diamond3"></i> Income Report</a></li>
                            <li class="{{ (Request::is('report/expense','') ? 'active' : '') }}"><a href="{{action('Report\Expense\ExpenseController@index')}}"><i class="icon-diamond3"></i> Expense Report</a></li>
                            <li class="{{ (Request::is('report/ranter','') ? 'active' : '') }}"><a href="{{action('Report\RanterController@index')}}"><i class="icon-diamond3"></i> Ranter Report</a></li>
                            <li class="{{ (Request::is('report/overview','') ? 'active' : '') }}"><a href="{{action('Report\OverviewController@index')}}"><i class="icon-diamond3"></i> Overview Report</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
