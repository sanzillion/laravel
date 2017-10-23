@extends ('layouts.dashboard.master')

@section ('content')

  <header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">General Admin Dashboard / <a href="/admin/manage" style="color: white">
        <b style="font-size: .8em !important;">Manage Users</b></a></h2>
    </div>
  </header>

  @include('layouts.errors')

  <div class="row incon">

    <div class="col-md-12 col-sm-12">
    
      <section class="dashboard-counts no-padding-bottom no-padding-top">
        <div class="container-fluid no-padding">
          <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-md-3 col-sm-6">
              <div class="item d-flex align-items-center">
                <div class="icon bg-violet"><i class="fa fa-user-circle-o"></i></div>
                <div class="title"><span>SOS users<br>{{ $month }} : &nbsp<b class="m_users"> 0</b></span>
                  <div class="progress">
                    <div role="progressbar" style="width: 0%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet memprog"></div>
                  </div>
                </div>
                <div class="number sosmember"><strong>0</strong></div>
              </div>
            </div>
            <!-- Item -->
            <div class="col-md-3 col-sm-6">
              <div class="item d-flex align-items-center">
                <div class="icon bg-red"><i class="fa fa-tty"></i></div>
                <div class="title"><span>SMS work<br>{{ $month }} : &nbsp<b class="m_sms"> 0</b></span>
                  <div class="progress">
                    <div role="progressbar" style="width: 0%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                  </div>
                </div>
                <div class="number smswork"><strong>0</strong></div>
              </div>
            </div>
            <!-- Item -->
            <div class="col-md-3 col-sm-6">
              <div class="item d-flex align-items-center">
                <div class="icon bg-green"><i class="fa fa-pencil-square"></i></div>
                <div class="title"><span>Blog posts<br>{{ $month }} : &nbsp<b class="m_posts"> 0</b></span>
                  <div class="progress">
                    <div role="progressbar" style="width: 0%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                  </div>
                </div>
                <div class="number blogposts"><strong>0</strong></div>
              </div>
            </div>
            <!-- Item -->
            <div class="col-md-3 col-sm-6">
              <div class="item d-flex align-items-center">
                <div class="icon bg-orange"><i class="fa fa-archive"></i></div>
                <div class="title"><span>Files docs<br>{{ $month }} : &nbsp<b class="m_files"> 0</b></span>
                  <div class="progress">
                    <div role="progressbar" style="width: 0%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                  </div>
                </div>
                <div class="number filesdocs"><strong>0</strong></div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Dashboard Header Section    -->
      <section class="dashboard-header">
        <div class="container-fluid">
          <div class="row">
            <div class="chart col-lg-3 col-12">
              <!-- Numbers-->
              <div id="app" class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-redder statIcon"><i class="fa fa-line-chart"></i></div>
                <div class="text"><strong>SOS App</strong><br><small class="text-redder stat">Not Connected</small></div>
              </div>
              <!-- Bar Chart   -->
              <div class="bar-chart has-shadow bg-white">
                <div class="title"><strong class="text-violet uptime">0%</strong><br><small>Current Server Uptime</small></div>
                {{-- <div class="title"><strong class="text-violet">95%</strong><br><small>Mobile App Request</small></div> --}}
                <canvas id="barChartHome"></canvas>
              </div>
            </div>
            <!-- Line Chart            -->
            <div class="chart col-lg-6 col-12">
              <div class="bar-chart-example card no-margin-bottom">
                <div class="card-close">
                </div>
                <div class="card-header align-items-center text-center">
                  <h3 class="h4">Page View Statistics</h3>
                </div>
                <div class="card-body">
                  <canvas id="barChartExample"></canvas>
                </div>
              </div>
            </div>
            <!-- Statistics -->
            <div class="statistics col-lg-3 col-12 ">
              <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-red"><i class="fa fa-plus-circle"></i></div>
                <div class="text apply"><strong>0</strong><br><small>Applications</small></div>
              </div>
              <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-green"><i class="fa fa-check-circle"></i></div>
                <div class="text approve"><strong>0</strong><br><small>Approved</small></div>
              </div>
              <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-orange"><i class="fa fa-cloud-download"></i></div>
                <div class="text download"><strong>0</strong><br><small>Downloads</small></div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>

  </div>


@endsection

@section ('scripts')

  <script>
    var appStatus = 'not connected';
  </script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/master.js') }}"></script>
  <script src="{{ asset('js/admin/admin.js') }}"></script>
  <script src="{{ asset('js/dashboard/Chart.min.js') }}"></script>
  <script src="{{ asset('js/dashboard/charts-home.js') }}"></script>
  <script src="{{ asset('js/dashboard/charts-custom.js') }}"></script>

@endsection